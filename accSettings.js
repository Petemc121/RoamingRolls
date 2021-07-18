const change1 = document.getElementById("changeUserButton");
const change2 = document.getElementById("changeEmailButton");
const change3 = document.getElementById("changePassButton");
const usernameSet = document.getElementById("usernameSet");
const emailAddressSet = document.getElementById("emailAddressSet");
const usernameOut = document.getElementById("usernameOut");
const emailOut = document.getElementById("emailOut");
const emailsave = document.getElementById("emailsave");
const emailCancel = document.getElementById("emailCancel");
const usernameSave = document.getElementById("usernameSave");
const usernameCancel = document.getElementById("usernameCancel");
const deleteAccount = document.getElementById("deleteAccount");
const hiddenButton = document.getElementById("hiddenButton");

change1.addEventListener("click", function () {
  usernameSet.style.display = "block";
  usernameOut.style.display = "none";
  change1.style.display = "none";
  usernameSave.style.display = "block";
  usernameCancel.style.display = "block";
});

change2.addEventListener("click", function () {
  emailAddressSet.style.display = "block";
  emailOut.style.display = "none";
  change2.style.display = "none";
  emailSave.style.display = "block";
  emailCancel.style.display = "block";
});

change3.addEventListener("click", function () {
  passwordSet.style.display = "block";
  passwordSet2.style.display = "block";
  change3.style.display = "none";
  passwordSave.style.display = "block";
  passwordCancel.style.display = "block";
  reEnterLabel.style.display = "block";
});

usernameCancel.addEventListener("click", function () {
  usernameSet.style.display = "none";
  usernameOut.style.display = "block";
  change1.style.display = "block";
  usernameSave.style.display = "none";
  usernameCancel.style.display = "none";
});

emailCancel.addEventListener("click", function () {
  emailAddressSet.style.display = "none";
  emailOut.style.display = "block";
  change2.style.display = "block";
  emailSave.style.display = "none";
  emailCancel.style.display = "none";
});

deleteAccount.addEventListener("click", function () {
  if (
    confirm(
      "Are you sure you want to delete your account? Any content associated with your account will be deleted (including gyms)."
    )
  ) {
    hiddenButton.click();
    console.log("Your account has been deleted");
  }
});
