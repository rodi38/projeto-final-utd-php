<?=$this->section('content');?>
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?=$sub;?> </h1>
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
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?=base_url();?>/livros/salvar" method="POST">
					<input type="hidden" value="<?=$result['id_livro'];?>" name="id_livro"><br><br>

					<label> Nome do Livro </label><br>
					<input type="text" value="<?=$result['livro_nome'];?>" name="livro_nome"><br><br>

					<label> Capa do Livro </label><br>
					<input type="text" value="<?=$result['livro_capa'];?>" name="livro_capa"><br><br>

					<label> Autor do Livro </label><br>
					<input type="text" value="<?=$result['livro_autor'];?>" name="livro_autor"><br><br>

					<input type="submit">
				</form>
              </div>
              <!-- /.card-body -->
        </div>
      </div>
    
    </section>

<?=$this->endSection(); ?>