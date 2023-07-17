<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Sistema de Esquela</title>
  <link rel="stylesheet" href="sty_esquela.css">
</head>
<body>
  <div class="container">
    <div class="sidebar">
    
      <img src="equipo.png" alt="Imagen" class="logo">
      <label for="tipo-acta">Sistema de Esquela:</label>
      <select id="tipo-acta">
        <option value="Acta de Acuerdo">Acta de Acuerdo</option>
        <option value="Acta de Notificacion">Acta de Notificacion</option>
        <option value="Informe de dessismt">Informe de dessismt</option>
        <option value="Solicitud de Desmientos">Solicitud de Desmientos</option>
      </select>
      <button id="Aceptar">Aceptar</button>

      <div class="block">
        <label class="Abogado"><b></b></label>
        <input type="text" class="nexpe" id="nexpe" >
      </div>
      
      <div class="block">
        <label class="Abogado"><b></b></label>
        <input type="text" class="nexpe" id="nexpe" >
      </div>
      
    </div>

    <div class="content">
      <div id="title-container" style="display: none;">
        <h2 id="esquela-title"></h2>
      </div>

      <div class="block">
        <label class="Conciliador"><b>Conciliador</b></label>
        <div class="Conciliador_">
          <select class="Conciliador__" name="Conciliador">
            
          </select>
        </div>
        
      </div>

      <div class="block">
        <label class="Abogado"><b>Abogado</b></label>
        <div class="Abogado_">
          <select class="Abogado__" name="Abogado">
              
          </select>
        </div>
      </div>

      <div class="block">
        <label class="Invitado_"><b>Invitado</b></label>
        <div class="Invitado_">
          <select class="Invitado__" name="Invitado">
            
          </select>
        </div>
      </div>

      <div class="block">
        <label class="Abogado"><b>Numero de Expediente</b></label>
        <input type="text" class="nexpe" id="nexpe" >
      </div>

      <div class="block">
        <label class="Abogado"><b>Informacion del caso</b></label>
        <div class="info" contenteditable="true"></div>
      </div>
      
      <a href="#">
        <button id="Mandar">Mandar</button>
      </a>
      
    </div>
    
  </div>

  
  <script src="script.js"></script>
</body>

</html>
