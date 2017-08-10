<style type="text/css">
    .centrar-tabla{
        align-content: center;
        margin-left: 0px;
        margin-right: 10px;
    }
    .encabezado{
        align-content: center;
    }
    .logoderecho{
        
        width: 100px;
        height: 100px;
    }
    .logoizquierdo{
        width: 100px;
        height: 100px;
    }

    .separacionEncabezado{
        height: 30px;
    }
    td{
        padding: 4px;
        height: auto;
    }
    table {
      margin-left: auto;
      margin-right: auto;
    }

</style>


<page style="font: arial; font-size: 16px;" backtop="30mm" backbottom="10mm" backleft="2mm" backright="46mm">
<page_header>

    <table style="width: 100%; border: solid 0px black;">
        <tr>
            <td style="text-align: left;    width: 10%;border: solid 0px black;"><img src="<?php echo base_url(); ?>/assets/img/logoEstado.jpg" class="logoizquierdo" ></td>
            <td style="text-align: center;    width: 73% ;border: solid 0px black;"><h2 align="center">CBT ING. Salvador Sánchez Colín, Jilotepec.</h2>
            
            </td>
            <td style="text-align: right;    width: 10% ;border: solid 0px black;"><img src="<?php echo base_url(); ?>/assets/img/CBTLogoPDF.jpg" class="logoderecho"></td>
        </tr>

    </table>
</page_header>

<page_footer>
    <table style="width: 100%; border: solid 0px black;">
        <tr>
            <td style="text-align: left;    width: 50%"><?php echo date('d/m/Y')."  "; ?>km. 5, Carr. México-Huichapan,  San Juan Acazuchitlán, Jilotepec, México, C.P. 54274.</td>
            <td style="text-align: right;    width: 50%">pagina [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
</page_footer>

<!-- inicia el cuerpo del pdf -->
<div class="separacionEncabezado">
    
</div>
<table border="1px" border="1px" cellspacing="0px" style="max-width: 300px;">
    <tr>
        <td colspan="2" style="text-align: center; background-color: #C0C0C0;">Datos del alumno</td>
    </tr>
    <tr>
        <td>Matricula del alumno</td>
        <td><?php echo $MatriculaAlumno; ?></td>
    </tr>
    <tr>
        <td>Nombre: </td>
        <td><?php echo $Nombre; ?></td>
    </tr>
    <tr>
        <td>Grado y grupo: </td>
        <td><?php echo $Grado ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; background-color: #C0C0C0;">Datos del libro</td>
    </tr>
    <tr>
        <td>Clave del libro</td>
        <td><?php echo  $ClaveLibro;?></td>
    </tr>
    <tr>
        <td>Descripción del libro</td>
        <td><?php echo $DatosLibro; ?></td>
    </tr>
    <tr>
        <td>Fecha de prestamo </td>
        <td>
            <?php
                $date = new DateTime($FechaPrestamo);
                echo $date->format('d-m-Y'); 
            ?>   
         </td>
    </tr>
    <tr>
        <td>Tipo de prestamo </td>
        <td><?php echo $TipoPrestamo; ?></td>
    </tr>
    <tr>
        <td>Fecha limite de entrega</td>
        <td>
            <?php
                $date = new DateTime($FechaLimiteEntrega);
                echo $date->format('d-m-Y');
            ?> 
        </td>
    </tr>
</table>

<!-- termina el cuerpo del pdf -->

</page>