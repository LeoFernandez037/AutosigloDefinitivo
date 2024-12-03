<link rel="stylesheet" href="./style.css">

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
                    <a href="admi.php?id=<?php echo $id?>" class="sidebar-link">
                        <!-- <i class="lni lni-user"></i>  -->
                        <img src="./home.png" alt="">
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <!-- <i class="lni lni-producthunt"></i> -->
                        <img src="./inv.png" alt="">
                        <span>Informes</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="informeclientesadmin.php?id=<?php echo $id?>" class="sidebar-link">•     Informe Clientes</a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a href="informeautosadmin.php?id=<?php echo $id?>" class="sidebar-link">•     Informe Vehiculos</a>
                        </li> -->
                        <li class="sidebar-item">
                            <a href="informeventasadmin.php?id=<?php echo $id?>" class="sidebar-link">•     Informe Ventas</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#authcli" aria-expanded="false" aria-controls="auth">
                        <!-- <i class="lni lni-producthunt"></i> -->
                        <i class="lni lni-users"></i>
                        <span>Clientes</span>
                    </a>
                    <ul id="authcli" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="clientesadmin.php?id=<?php echo $id?>" class="sidebar-link">•     Ver lista clientes</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="clientesadminedit.php?id=<?php echo $id?>" class="sidebar-link">•     Editar clientes</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="clientesadmindelete.php?id=<?php echo $id?>" class="sidebar-link">•     Eliminar clientes</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#authempl" aria-expanded="false" aria-controls="auth">
                        <!-- <i class="lni lni-producthunt"></i> -->
                        <i class="lni lni-users"></i>
                        <span>Empleados</span>
                    </a>
                    <ul id="authempl" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="empleadosadmin.php?id=<?php echo $id?>" class="sidebar-link">•     Ver nomina</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="empleadosadminedit.php?id=<?php echo $id?>" class="sidebar-link">•     Editar empleados</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="empleadosadmindelete.php?id=<?php echo $id?>" class="sidebar-link">•     Eliminar empleados</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#authcar" aria-expanded="false" aria-controls="auth">
                        <!-- <i class="lni lni-producthunt"></i> -->
                        <i class="lni lni-users"></i>
                        <span>Autos</span>
                    </a>
                    <ul id="authcar" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="autosadmin.php?id=<?php echo $id?>" class="sidebar-link">•     Ver listado</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="autosadminedit.php?id=<?php echo $id?>" class="sidebar-link">•     Editar autos</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="autosadmindelete.php?id=<?php echo $id?>" class="sidebar-link">•     Eliminar autos</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#authres" aria-expanded="false" aria-controls="auth">
                        <!-- <i class="lni lni-producthunt"></i> -->
                        <i class="lni lni-users"></i>
                        <span>Repuestos</span>
                    </a>
                    <ul id="authres" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="repuestosadmin.php?id=<?php echo $id?>" class="sidebar-link">•     Ver listado</a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a href="empleadosadminedit.php?id=<?php echo $id?>" class="sidebar-link">•     Editar repuestos</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="empleadosadmindelete.php?id=<?php echo $id?>" class="sidebar-link">•     Eliminar repuestos</a>
                        </li> -->
                    </ul>
                </li>
                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#auth2" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-producthunt"></i> 
                        <img src="./inv.png" alt="">
                        <span>Inventario</span> 
                    </a>
                    <ul id="auth2" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="autosadmin.php?id=<?php echo $id?>" class="sidebar-link">• Autos</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="repuestosadmin.php?id=<?php echo $id?>" class="sidebar-link">• Repuestos</a>
                        </li>
                    </ul>
                </li> -->
                <li class="sidebar-item">
                    <a href="nuevaVentaAdmin.php?id=<?php echo $id?>" class="sidebar-link">
                        <img src="./pen.png" alt="">
                        <span>Ventas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="perfiladmin.php?id=<?php echo $id?>" class="sidebar-link">
                        <!-- <i class="lni lni-delivery"></i> -->
                        <img src="./prof.png" alt="">
                        <span>Perfil</span>
                    </a>
                </li>
            </ul>
        </aside>