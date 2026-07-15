(() => {
  document.querySelectorAll(".needs-validation").forEach((form) => {
    form.addEventListener(
      "submit",
      (e) => {
        if (!form.checkValidity()) {
          e.preventDefault();
          e.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false,
    );
  });

  const p1 = document.getElementById("regPass");
  const p2 = document.getElementById("regPass2");
  if (p1 && p2) {
    const check = () =>
      p2.setCustomValidity(p2.value !== p1.value ? "mismatch" : "");
    p1.addEventListener("input", check);
    p2.addEventListener("input", check);
  }

  document.querySelectorAll(".pw-toggle").forEach((btn) => {
    btn.addEventListener("click", () => {
      const input = document.getElementById(btn.dataset.toggleTarget);
      const isPw = input.type === "password";
      input.type = isPw ? "text" : "password";
      btn.textContent = isPw ? "🙈" : "👁";
    });
  });

  document.querySelectorAll("[data-switch-to]").forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const target = document.getElementById(link.dataset.switchTo);
      bootstrap.Tab.getOrCreateInstance(target).show();
    });
  });
})();
