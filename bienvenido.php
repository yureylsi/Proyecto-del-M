<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pedido de Flores Eternas - INFINITE FLOWERS</title>
  <style>
    
    :root {
      --primary-color: #9a33d6; 
      --secondary-color: #6f42c1;
      --accent-color: #20c997;
      --light-pink: #f8d7da; 
      --light-lavender: #e2d9f3; 
      --light-color: #f9f7fd;
      --dark-color: #343a40; 
      --text-color: #495057;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, var(--light-lavender), var(--light-pink));
      margin: 0;
      padding: 0;
      min-height: 100vh;
      color: var(--text-color);
    }
    
    .container {
      max-width: 750px;
      margin: 30px auto;
      background: var(--light-color);
      padding: 35px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      border: 2px solid var(--light-lavender);
    }
    
    .header {
      text-align: center;
      margin-bottom: 25px;
      padding-bottom: 20px;
      border-bottom: 3px solid var(--primary-color);
    }
    
    h1 {
      color: var(--primary-color);
      margin-bottom: 10px;
      font-size: 32px;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }
    
    .subtitle {
      text-align: center;
      color: var(--text-color);
      margin-bottom: 30px;
      font-size: 18px;
    }
    
    label {
      display: block;
      margin-top: 20px;
      font-weight: 600;
      color: var(--dark-color);
    }
    
    input, select, textarea {
      width: 100%;
      padding: 12px 15px;
      margin-top: 8px;
      border-radius: 10px;
      border: 2px solid var(--light-lavender);
      font-size: 15px;
      transition: all 0.3s ease;
      background-color: white;
    }
    
    input:focus, select:focus, textarea:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.1);
    }
    
    textarea {
      resize: vertical;
      min-height: 80px;
    }
    
    .button-group {
      display: flex;
      gap: 15px;
      margin-top: 30px;
    }
    
    .btn-pedido {
      flex: 2;
      padding: 15px;
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      color: white;
      font-size: 17px;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
    }
    
    .btn-pedido:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(214, 51, 132, 0.4);
      background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
    }
    
    .btn-inicio {
      flex: 1;
      padding: 15px;
      background: white;
      color: var(--primary-color);
      font-size: 16px;
      font-weight: bold;
      border: 2px solid var(--primary-color);
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    
    .btn-inicio:hover {
      background-color: var(--light-pink);
      transform: translateY(-3px);
      box-shadow: 0 4px 10px rgba(214, 51, 132, 0.2);
    }
    
    .footer {
      text-align: center;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid var(--light-lavender);
      font-size: 14px;
      color: #777;
    }
    
    .logo-reference {
      color: var(--primary-color);
      font-weight: bold;
      font-size: 16px;
      margin-bottom: 5px;
    }
    
    .required {
      color: var(--primary-color);
      font-weight: bold;
    }
    
    .form-note {
      background-color: var(--light-pink);
      padding: 15px;
      border-radius: 10px;
      margin-top: 20px;
      border-left: 4px solid var(--primary-color);
      font-size: 14px;
    }
    
    @media (max-width: 768px) {
      .container {
        margin: 15px;
        padding: 25px 20px;
      }
      
      .button-group {
        flex-direction: column;
      }
      
      .btn-pedido, .btn-inicio {
        width: 100%;
      }
      
      h1 {
        font-size: 28px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="header">
      <h1> Pedido de Flores Eternas </h1>
      <div class="logo-reference">INFINITE FLOWERS</div>
    </div>
    
    <p class="subtitle">Completa el formulario para realizar tu pedido personalizado</p>

    <form id="pedidoForm">
      <label>Nombre del cliente <span class="required">*</span></label>
      <input type="text" placeholder="Escribe tu nombre completo" required>

      <label>Teléfono <span class="required">*</span></label>
      <input type="tel" placeholder="Ej: 809-000-0000" required>

      <label>Tipo de arreglo <span class="required">*</span></label>
      <select required>
        <option value="">Seleccione una opción</option>
        <option>Ramo pequeño (15-20 flores)</option>
        <option>Ramo mediano (25-30 flores)</option>
        <option>Ramo grande (35-45 flores)</option>
        <option>Arreglo en caja especial</option>
        <option>Corona floral para eventos</option>
        <option>Cesta de flores mixtas</option>
        <option>Arreglo personalizado (especificar abajo)</option>
      </select>

      <label>Color de flores</label>
      <select>
        <option>Rojo pasión</option>
        <option>Rosado suave</option>
        <option>Blanco pureza</option>
        <option>Amarillo brillante</option>
        <option>Violeta elegante</option>
        <option>Mixto (combinación especial)</option>
        <option>Otro (especificar abajo)</option>
      </select>

      <label>Mensaje para la tarjeta</label>
      <textarea rows="3" placeholder="Escribe el mensaje que deseas incluir en la tarjeta..."></textarea>

      <label>Detalle del arreglo <span class="required">*</span></label>
      <textarea rows="5" placeholder="Describe con detalle lo que deseas incluir en tu arreglo: tipo de flores específicas, cantidad exacta, colores preferidos, decoraciones adicionales (moños, mariposas, luces, cintas), dedicatorias especiales, etc." required></textarea>

      <label>Fecha de entrega <span class="required">*</span></label>
      <input type="date" required>
      
      <label>Dirección de entrega <span class="required">*</span></label>
      <textarea rows="3" placeholder="Dirección completa para la entrega del pedido" required></textarea>
      
      <div class="form-note">
        <strong>Nota:</strong> Todos los pedidos se confirman por teléfono. Nos pondremos en contacto contigo en un plazo máximo de 24 horas para confirmar disponibilidad y precio final.
      </div>

      <div class="button-group">
        <button type="submit" class="btn-pedido"> Realizar Pedido</button>
        <a href="index.html" class="btn-inicio">
          <i class="fas fa-home"></i> Volver al Inicio
        </a>
      </div>
    </form>

    <div class="footer">
      © 2023 INFINITE FLOWERS | Hecho con <span style="color: var(--primary-color);"></span> por Grupo #2
    </div>
  </div>

 
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  
  <script>
    
    document.addEventListener('DOMContentLoaded', function() {
      const today = new Date().toISOString().split('T')[0];
      const dateInput = document.querySelector('input[type="date"]');
      dateInput.min = today;
      
      
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1);
      const tomorrowStr = tomorrow.toISOString().split('T')[0];
      dateInput.min = tomorrowStr;
      
     
      document.getElementById('pedidoForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
     
        const nombre = this.querySelector('input[type="text"]').value;
        const telefono = this.querySelector('input[type="tel"]').value;
        const tipoArreglo = this.querySelector('select').value;
        const fecha = this.querySelector('input[type="date"]').value;
        
        if (!nombre || !telefono || !tipoArreglo || !fecha) {
          alert('Por favor, complete todos los campos obligatorios (*)');
          return;
        }
        
        
        alert(' Pedido enviado correctamente\n\nNos pondremos en contacto contigo en las próximas 24 horas para confirmar los detalles y el precio final.\n\n¡Gracias por elegir INFINITE FLOWERS!');
        
       
        this.reset();
        
        
        dateInput.min = tomorrowStr;
        
        
      });
    });
  </script>
</body>
</html>