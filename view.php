<?php
    require_once 'config/conexion.php';
    include_once 'controller/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo 'CRUD'.title ?></title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/estilos.css">

  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>CRUD <b>PHP</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Borrar Seleccionado</span></a>						
					</div>
                </div>
            </div>
            <?php 
            $obj = new pagination();
            $obj_Registers = $obj->Registers();
            $obj_cantRegisters = $obj->totalRegisters();
            ?>
            <!--Start show registers-->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th style="color:#2d3436;">Nombres</th>
                        <th style="color:#2d3436;">Apellidos</th>
						<th style="color:#2d3436;">Edad</th>
                        <th style="color:#2d3436;">Estado</th>
                        <th style="color:#2d3436;">DNI</th>
                        <th style="color:#2d3436;">Fecha de registro</th>
                        <th style="color:#2d3436;">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($obj_Registers as $row)
                    {
                        ?>
                        <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td><?php echo $row->nombres; ?></td>
                        <td><?php echo $row->apellidos; ?></td>
						<td><?php echo $row->edad; ?></td>
						<td><?php echo $row->estado; ?></td>
                        <td><?php echo $row->dni; ?></td>
                        <td><?php echo $row->fecha_de_registro; ?></td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
            <!--End-->

			<div class="clearfix">
                <div class="hint-text">Mostrando <b><?php echo $obj->_cRegistros; ?></b> de <b><?php echo $obj_cantRegisters; ?></b> registros</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Registro</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombres</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Apellido</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Edad</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Estado</label>
							<input type="text" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Dni</label>
							<input type="text" class="form-control" required>
						</div>
                        					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Editar Usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombres</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Edad</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Estado</label>
							<input type="text" class="form-control" required>
						</div>					
                        <div class="form-group">
							<label>Dni</label>
							<input type="text" class="form-control" required>
						</div>	
                    </div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Agregar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Borrar Registro</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/jsdocument.js"></script>
</html>