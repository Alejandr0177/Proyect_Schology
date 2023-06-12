<div class="container-fluid">

    <div class="container py-5">

        <div class="posicion">

            <div class="login-box">

                <h2>Login</h2>
                <form method="post">

                    <div class="user-box">

                        <input type="email" id="email" name="ingresoEmail" required="">
                        <label>Email</label>

                    </div>

                    <div class="user-box">

                        <input type="password" id="password" name="ingresoPassword" required="">
                        <label>Password</label>

                    </div>

                    <?php
                
                    $ingreso = new ControladorEstudiante();
                    $ingreso -> ctrIngreso();
                
                    ?>

                    <button class="btn" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Submit
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>