const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", function (event) {
  event.preventDefault(); // mencegah reload

  const email = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();

  // Validasi kosong
  if (email === "" || password === "") {
    alert("Email dan password tidak boleh kosong.");
    return;
  }

  // Validasi email harus diakhiri dengan .gmail.com
  if (!email.endsWith("@gmail.com")) {
    alert("Email harus menggunakan domain @gmail.com");
    return;
  }

  // Validasi password minimal 6 karakter
  if (password.length < 6) {
    alert("Password harus minimal 6 karakter.");
    return;
  }

  // Login sukses (contoh)
  if (email === "admin@gmail.com" && password === "123456") {
    alert("Login berhasil!");
    window.location.href = "home.html"; // halaman setelah login
  } else {
    alert("Email atau password salah.");
  }
});
