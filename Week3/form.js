const joshuaForm = document.querySelector("form");
const firstName = document.querySelector("#firstName");
const lastName = document.querySelector("#lastName");
const phoneNumber = document.querySelector("#phoneNumber");
const formWarning = document.createElement("h3");
let thereIsError = false;
const firstNameError = document.createElement("p");
const lastNameError = document.createElement("p");
const phoneError = document.createElement("p");

// FIRSTNAME CHECK

firstName.addEventListener("input", () => {
  const firstNameValue = firstName.value.trim();
  const parent = firstName.parentElement;

  if (parent.contains(firstNameError)) {
    parent.removeChild(firstNameError);
  }

  if (!firstNameValue) {
    firstNameError.textContent = "🛈 No name entered";
    firstNameError.className = "firstNameError";
    parent.append(firstNameError);
    thereIsError = true;
  } else if (/\d/.test(firstNameValue)) {
    firstNameError.textContent = "🛈 Name cannot contain a number";
    firstNameError.className = "firstNameError";
    parent.append(firstNameError);
    thereIsError = true;
  } else {
    thereIsError = false;
    if (parent.contains(firstNameError)) {
      parent.removeChild(firstNameError);
    }
  }
});

// LAST NAME CHECK

lastName.addEventListener("input", () => {
  const lastNameValue = lastName.value.trim();
  const parent = lastName.parentElement;

  if (parent.contains(lastNameError)) {
    parent.removeChild(lastNameError);
  }

  if (!lastNameValue) {
    lastNameError.textContent = "🛈 No name entered";
    lastNameError.className = "lastNameError";
    parent.append(lastNameError);
    thereIsError = true;
  } else if (/\d/.test(lastNameValue)) {
    lastNameError.textContent = "🛈 Name cannot contain a number";
    lastNameError.className = "lastNameError";
    parent.append(lastNameError);
    thereIsError = true;
  } else {
    thereIsError = false;
    if (parent.contains(lastNameError)) {
      parent.removeChild(lastNameError);
    }
  }
});

// PHONE NUMBER CHECK

phoneNumber.addEventListener("input", () => {
  const phoneValue = phoneNumber.value.trim();
  const parent = phoneNumber.parentElement;

  if (parent.contains(phoneError)) {
    parent.removeChild(phoneError);
  }

  if (!phoneValue) {
    phoneError.textContent = "🛈 No number entered";
    phoneError.className = "phoneError";
    parent.append(phoneError);
    thereIsError = true;
  } else if (/[^0-9]/.test(phoneValue)) {
    phoneError.textContent = "🛈 Number cannot contain characters";
    phoneError.className = "phoneError";
    parent.append(phoneError);
    thereIsError = true;
  } else {
    thereIsError = false;
    if (parent.contains(phoneError)) {
      parent.removeChild(phoneError);
    }
  }
});

// SUBMIT CHECK

joshuaForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const firstNameValue = firstName.value.trim();
  const lastNameValue = lastName.value.trim();
  const phoneValue = phoneNumber.value.trim();

  if (joshuaForm.contains(formWarning)) {
    joshuaForm.removeChild(formWarning);

    if (thereIsError) {
      formWarning.textContent = "⚠ There's a wrong value somewhere here!";
      formWarning.className = "formWarning";
      joshuaForm.prepend(formWarning);
    }
  } else if (!firstNameValue || !lastNameValue || !phoneValue) {
    formWarning.textContent = "⚠ Something is missing in your entry!";
    formWarning.className = "formWarning";
    joshuaForm.prepend(formWarning);
  } else {
    document.forms[0].remove();
    document.querySelector("h1").textContent = "Thanks for submitting";
    setTimeout(() => location.reload(), 5000);
    const contactStore = [firstNameValue, lastNameValue, phoneValue];
    const contactStoreJSON = JSON.stringify(contactStore);
    localStorage.setItem(`Contact For ${firstNameValue}`, contactStoreJSON);
  }
});
