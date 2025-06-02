const passwordInput = document.getElementById("password");
const toggleIcon = document.getElementById("togglePassword");
toggleIcon.addEventListener("click", function () {
    const type =
        passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    toggleIcon.setAttribute(
        "icon",
        type === "password" ? "mdi:eye" : "mdi:eye-off"
    );
});
