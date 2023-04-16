<?php

    class Informe extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function pdfEmpleados()
        {

            if(isset($_SESSION['nivel']))
            {
                if($_SESSION['nivel']==3)
                {
                    if(!empty($_POST))
                    {
                        if(!empty($_POST['sArea']))
                        {
                            $datos = $this->getModel()->empleados(1, $_POST['sArea']);
                        }
        
                        // PDF
                        $pdf = new TCPDF();
                        $pdf->setPageOrientation('L');
                        $pdf->setHeaderMargin(15);
                        $pdf->setHeaderData(PDF_HEADER_LOGO, 60, "Reporte", "Listado de Empleados por Area");
                        $pdf->SetMargins(10,40,10);

                        if(!empty($datos))
                        {
                            $contenido = '<table cellpadding="4" border="2">
                            <tr style="background-color:black; color: white; text-align:center;">
                                <td scope="col">ID</td>
                                <td scope="col">Nombre</td>
                                <td scope="col">Apellido</td>
                                <td scope="col">Genero</td>
                                <td scope="col">Direccion</td>
                                <td scope="col">Fecha Nacimiento</td>
                                <td scope="col">Email</td>
                                <td scope="col">Telefono</td>
                                <td scope="col">Area</td>
                                <td scope="col">Cargo</td>
                                <td scope="col">Usuario</td>
                            </tr>';
                            foreach ($datos as $value) {
                                $contenido .= '<tr>
                                    <td style="text-align:center; background-color: grey;">'.$value['ID_EMPLEADO'].'</td>
                                    <td>'.$value['NOMBRE_EMPLEADO'].'</td>
                                    <td>'.$value['APELLIDO_EMPLEADO'].'</td>
                                    <td>'.$value['GENERO_EMPLEADO'].'</td>
                                    <td>'.$value['DIRECCION_EMPLEADO'].'</td>
                                    <td>'.$value['FECHA_NAC_EMP'].'</td>
                                    <td>'.$value['EMAIL_EMPLEADO'].'</td>
                                    <td>'.$value['TELEFONO_EMPLEADO'].'</td>
                                    <td>'.$value['AREA'].'</td>
                                    <td>'.$value['CARGO'].'</td>
                                    <td>'.$value['USUARIO'].'</td>
                                </tr>';
                            }

                            $contenido .= '</table>';
                        } 
                        else 
                        {
                            $contenido = "No hay empleados";
                        }
                        
                        $pdf->AddPage();
                        $pdf->writeHTML($contenido);
                        $pdf->Output("reporteEmpleados.pdf");
                    } 
                    else 
                    {
                        $this->getView()->areas = $this->getModel()->areas();
                        $pagina = 'Informe/pdfempleados';
                        $this->getView()->loadView($pagina);
                    }   
                } 
                else 
                {
                    $pagina = 'Inicio/index';
                    $this->getView()->loadView($pagina);
                } 
            } 
            else 
            {
                $pagina = "Inicio/login";
                $this->getView()->loadView($pagina);
            }           
        }

        public function pdfTareasAreas()
        {

            if(isset($_SESSION['nivel']))
            {
                if($_SESSION['nivel']==3)
                {
                    if(!empty($_POST))
                    {
                        if(!empty($_POST['txtArea']))
                        {
                            $datos = $this->getModel()->tareaAreas(0, $_POST['txtArea']);
                        }
        
                        // PDF
                        $pdf = new TCPDF();
                        $pdf->setHeaderMargin(15);
                        $pdf->setHeaderData(PDF_HEADER_LOGO, 60, "Reporte", "Listado de Estado de Tareas por Area");
                        $pdf->SetMargins(10,40,10);

                        if(!empty($datos))
                        {
                            $contenido = '<table cellpadding="4" border="2">
                            <tr style="background-color:black; color: white; text-align:center;">
                                <td scope="col">ID</td>
                                <td scope="col">Nombre</td>
                                <td scope="col">Descripcion</td>
                                <td scope="col">Empleado</td>
                                <td scope="col">Area</td>
                                <td scope="col">Estado</td>
                            </tr>';
                            foreach ($datos as $value) {
                                $contenido .= '<tr>
                                    <td style="text-align:center; background-color: grey;">'.$value['ID_TAREA'].'</td>
                                    <td>'.$value['NOMBRE_TAREA'].'</td>
                                    <td>'.$value['DESCRIPCION'].'</td>
                                    <td>'.$value['EMPLEADO'].'</td>
                                    <td>'.$value['AREA'].'</td>
                                    <td>'.$value['ESTADO'].'</td>
                                </tr>';
                            }

                            $contenido .= '</table>';
                        } 
                        else 
                        {
                            $contenido = "No hay tareas";
                        }
                        
                        $pdf->AddPage();
                        $pdf->writeHTML($contenido);
                        $pdf->Output("reporteTareasAreas.pdf");
                    } 
                    else 
                    {
                        $pagina = 'Informe/pdftareasareas';
                        $this->getView()->loadView($pagina);
                    }   
                } 
                else 
                {
                    $pagina = 'Inicio/index';
                    $this->getView()->loadView($pagina);
                } 
            } 
            else 
            {
                $pagina = "Inicio/login";
                $this->getView()->loadView($pagina);
            }           
        }

        public function pdfTareas()
        {

            if(isset($_SESSION['nivel']))
            {
                if($_SESSION['nivel']==3)
                {
                    if(!empty($_POST))
                    {
                        if(!empty($_POST['txtNombre']))
                        {
                            $datos = $this->getModel()->tareas(0, $_POST['txtNombre']);
                        }
        
                        // PDF
                        $pdf = new TCPDF();
                        $pdf->setHeaderMargin(15);
                        $pdf->setHeaderData(PDF_HEADER_LOGO, 60, "Reporte", "Listado de Tareas Asignadas a Empleado");
                        $pdf->SetMargins(10,40,10);

                        if(!empty($datos))
                        {
                            $contenido = '<table cellpadding="4" border="2">
                            <tr style="background-color:black; color: white; text-align:center;">
                                <td scope="col">ID</td>
                                <td scope="col">Nombre</td>
                                <td scope="col">Descripcion</td>
                                <td scope="col">Empleado</td>
                                <td scope="col">Estado</td>
                                <td scope="col">Asignado Por</td>
                            </tr>';
                            foreach ($datos as $value) {
                                $contenido .= '<tr>
                                    <td style="text-align:center; background-color: grey;">'.$value['ID_TAREA'].'</td>
                                    <td>'.$value['NOMBRE_TAREA'].'</td>
                                    <td>'.$value['DESCRIPCION'].'</td>
                                    <td>'.$value['EMPLEADO'].'</td>
                                    <td>'.$value['ESTADO'].'</td>
                                    <td>'.$value['ASIGNADO_POR'].'</td>
                                </tr>';
                            }

                            $contenido .= '</table>';
                        } 
                        else 
                        {
                            $contenido = "No hay tareas";
                        }
                        
                        $pdf->AddPage();
                        $pdf->writeHTML($contenido);
                        $pdf->Output("reporteTareas.pdf");
                    } 
                    else 
                    {
                        $pagina = 'Informe/pdftareas';
                        $this->getView()->loadView($pagina);
                    }   
                } 
                else 
                {
                    $pagina = 'Inicio/index';
                    $this->getView()->loadView($pagina);
                } 
            } 
            else 
            {
                $pagina = "Inicio/login";
                $this->getView()->loadView($pagina);
            }           
        }
    }
    
?>