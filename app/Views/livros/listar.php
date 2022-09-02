<?=$this->section('content');?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Titulo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Relatório </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Tabela de resultados -->
        <div class="card">
              <div class="card-header bg-gradient-secondary">
                <h3 class="card-title">
                    Listagem de Livros <a href="<?=base_url();?>/livros/inserir" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i></a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                

                <table id="example1" class="table table-bordered table-striped myTable table-sm" style="font-size: 12px !important">
					<thead class="bg-olive text-center">
					  <tr>
					    <th> ID </th>
					    <th> NOME </th>
					    <th> CAPA </th>
					    <th> AUTOR </th>
					    <th> DATA CRIACAO </th>
					    <th> AÇÕES </th>					                        
					  </tr>
					</thead>
					<tbody class="text-center"> 
					  	<?php foreach ($result as $key => $value): ?>
					  		<tr>
					  			<td><?=$value['id_livro'];?></td>
					  			<td><?=$value['livro_nome'];?></td>
					  			<td><?=$value['livro_capa'];?></td>
					  			<td><?=$value['livro_autor'];?></td>
					  			<td><?=$value['livro_criadoem'];?></td>
					  			<td>
					  				<a href="<?=base_url();?>/livros/editar/<?=$value['id_livro'];?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>	
					  				<a href="<?=base_url();?>/livros/delete/<?=$value['id_livro'];?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>	
					  			</td>
					  		</tr>
					  	<?php endforeach; ?>
					</tbody>

					<tfoot class="text-center">
					  <tr>
					    <th> ID </th>
					    <th> NOME </th>
					    <th> CAPA </th>
					    <th> AUTOR </th>
					    <th> DATA CRIACAO </th>
					    <th> AÇÕES </th>                   
					  </tr>
					</tfoot>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
      </div>
    
    </section>
    <!-- /.content -->
<?=$this->endSection(); ?>