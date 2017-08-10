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
    th{
        align-content: center;
    }
    table {
      margin-left: auto;
      margin-right: auto;
    }

</style>


<page style="font: arial; font-size: 12px;" backtop="30mm" backbottom="10mm" backleft="3mm" backright="152mm">
<page_header>

    <table style="width: 100%; border: solid 0px black;">
        <tr>
            <td style="text-align: left;    width: 10%;border: solid 0px black;"><img src="<?php echo base_url(); ?>/assets/img/logoEstado.jpg" class="logoizquierdo" ></td>
            <td style="text-align: center;    width: 73% ;border: solid 0px black;"><h2 align="center">Inventario<?php echo $tipoInventario; ?>, CBT ING. Salvador Sánchez Colín, Jilotepec.</h2>
            <!-- tipoInventario -->
            
            </td>
            <td style="text-align: right;    width: 10% ;border: solid 0px black;"><img src="<?php echo base_url(); ?>/assets/img/CBTLogoPDF.jpg" class="logoderecho"></td>
        </tr>

    </table>
</page_header>

<page_footer>
    <table style="width: 100%; border: solid 0px black;">
        <tr>
            <td style="text-align: left;    width: 50%"><?php echo date('d/m/Y')."  "; ?>km. 5, Carr. México-Huichapan,  San Juan Acazuchitlán, Jilotepec, México, C.P. 54274.</td>
            <td style="text-align: right;    width: 50%">Pagina [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
</page_footer>

<!-- inicia el cuerpo del pdf -->
<div class="separacionEncabezado">
    
</div>
<!-- cuerpo del inventario -->
<table border="1px" border="1px" cellspacing="0px">
    <tr>
        <th align="center">Nro</th>
        <th align="center">Clave de libro</th>
        <th align="center">Titulo</th>
        <th align="center">Autor</th>
        <th align="center">Editorial</th>
        <th align="center">Existencia</th>
    </tr>
    <?php $x=1 ?>
    <?php foreach ($inventario as $valor): ?>
            <tr>
                <td><?php echo $x; ?></td>
                <td><?php echo $valor->ClaveLibro;?></td>
                <td><?php echo $valor->Titulo; ?></td>
                <td><?php echo $valor->Autor; ?></td>
                <td><?php echo $valor->Editorial; ?></td>
                <td><?php echo $valor->Cantidad; ?></td>
            </tr>
        <?php $x++; ?>
    <?php endforeach ?>
    </table>

<!-- termina cuerpo del inventario -->



<!-- termina el cuerpo del pdf -->

</page>