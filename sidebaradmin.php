

<aside id="sidebar">
            <div class="d-flex">
                <button id="toogle-btn">
                    <i class="lni lni-car-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <h6>SISTEMA</h6>
                    <a href="#">GESIMAS</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="empleado.php?id=<?php echo $id?>" class="sidebar-link">
                        <!-- <i class="lni lni-user"></i>  -->
                        <img src="./home.png" alt="">
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="clientesadmin.php?id=<?php echo $id?>" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <!-- <i class="lni lni-producthunt"></i> -->
                        <img src="./inv.png" alt="">
                        <span>Inventario</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="autosadmin.php?id=<?php echo $id?>" class="sidebar-link">Autos</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="repuestosadmin.php?id=<?php echo $id?>" class="sidebar-link">Repuestos</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="nuevaVenta.php?id=<?php echo $id?>" class="sidebar-link">
                        <!-- <i class="lni lni-cart"></i> -->
                        <img src="./pen.png" alt="">
                        <span>Nueva Venta</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="perfil.php?id=<?php echo $id?>" class="sidebar-link">
                        <!-- <i class="lni lni-delivery"></i> -->
                        <img src="./prof.png" alt="">
                        <span>Perfil</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="index.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Cerrar sesion</span>
                </a>
            </div>
        </aside>