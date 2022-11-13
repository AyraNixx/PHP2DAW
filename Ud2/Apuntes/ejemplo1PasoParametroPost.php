<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!--Para coger CSS, cargar la referencia-->    
    <!--Jamas ponemos rutas absolutas o con dominios, te quita medio punto o mas
        siempre rutas relativas-->
    <link rel='stylesheet' type='text/css' media='screen' href='css/style1.css'>
    <script src='main.js'></script>
</head>
<body>
    <div class="container">

        <!--FORMULARIO-->

        <form action="recepcionDatosFormulario.php" method="post">


          <div class="row">
            <h4>Account</h4>
            <!--Nombre-->
            <div class="input-group input-group-icon">

              <!--En este bloque para el nombre, este es el campo que realmente nos interesa
                  como programadores.
                  Este formulario no sirve de nada si el input no tiene un nombre.
                  Valores importantes:
                    - El id. Es el identificador. Es recomendable ponerlo entre comillas y en inglés
                    - El atributo name. Cuando pases el formulario y le des a submit y los datos 
                      pasen a otro sitio, este atributo name corresponde al nombre de la variable 
                      a la que van a ser enviados.
                -->
                <!--En este input lo que se envía es el value.
                  Sin embargo, si es una imagen, un checkbox...qué es lo que se envía?-->
              <input type="text" placeholder="Full Name" id="name" name="name"/>
              <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <!--Correo electronico-->
            <div class="input-group input-group-icon">
              <input type="email" placeholder="Email Adress"/>
              <div class="input-icon"><i class="fa fa-envelope"></i></div>
            </div>
            <!--Contraseña-->
            <div class="input-group input-group-icon">
              <input type="password" placeholder="Password"/>
              <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>
          </div>


          <div class="row">
            <div class="col-half">
              <h4>Daddte of Birth</h4>
              <div class="input-group">
                <div class="col-third">
                  <input type="text" placeholder="DD"/>
                </div>
                <div class="col-third">
                  <input type="text" placeholder="MM"/>
                </div>
                <div class="col-third">
                  <input type="text" placeholder="YYYY"/>
                </div>
              </div>
            </div>
            <div class="col-half">
              <h4>Gender</h4>
              <div class="input-group">
                <input id="gender-male" type="radio" name="gender" value="male"/>
                <label for="gender-male">Male</label>
                <input id="gender-female" type="radio" name="gender" value="female"/>
                <label for="gender-female">Female</label>
              </div>
            </div>
          </div>
          <div class="row">
            <h4>Payment Details</h4>
            <div class="input-group">
              <input id="payment-method-card" type="radio" name="payment-method" value="card" checked="true"/>
              <label for="payment-method-card"><span><i class="fa fa-cc-visa"></i>Credit Card</span></label>
              <input id="payment-method-paypal" type="radio" name="payment-method" value="paypal"/>
              <label for="payment-method-paypal"> <span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
            </div>
            <div class="input-group input-group-icon">
              <input type="text" placeholder="Card Number"/>
              <div class="input-icon"><i class="fa fa-credit-card"></i></div>
            </div>
            <div class="col-half">
              <div class="input-group input-group-icon">
                <input type="text" placeholder="Card CVC"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
              </div>
            </div>
            <div class="col-half">
              <div class="input-group">
                <select>
                  <option>01 Jan</option>
                  <option>02 Jan</option>
                </select>
                <select>
                  <option>2015</option>
                  <option>2016</option>
                </select>
              </div>
            </div>
            
          </div>

          <div class="row">
            <div class="input-group">
              <!--Coge todo lo que hay en el formulario y lo envía al destino -->
                <input type="submit" value="Accept" id="send">
            </div>
          </div>

          <div class="row">
            <h4>Terms and Conditions</h4>
            <div class="input-group">
              <input id="terms" type="checkbox"/>
              <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
            </div>
          </div>
        </form>
      </div>
</body>
</html>