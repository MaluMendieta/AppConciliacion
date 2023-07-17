function toggleForm() {
    var loginForm = document.getElementById("login-form");
    var registerForm = document.getElementById("register-form");
  
    if (loginForm.style.display === "none") {
      loginForm.style.display = "block";
      registerForm.style.display = "none";
    } else {
      loginForm.style.display = "none";
      registerForm.style.display = "block";
    }
  }
  // Función para obtener la fecha actual en formato dd/mm/aaaa
  function getCurrentDate() {
    var today = new Date();
    var date = today.getDate();
    var month = today.getMonth() + 1; // Los meses van de 0 a 11
    var year = today.getFullYear();
    return date + '/' + month + '/' + year;
  }
  
  // Función para obtener la hora actual en formato hh:mm:ss
  function getCurrentTime() {
    var today = new Date();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var seconds = today.getSeconds();
    return hours + ':' + minutes + ':' + seconds;
  }
  
  // Actualizar la fecha y hora cada segundo
  setInterval(function() {
    document.getElementById('date').textContent = 'Fecha: ' + getCurrentDate();
    document.getElementById('time').textContent = 'Hora: ' + getCurrentTime();
  }, 1000);


  