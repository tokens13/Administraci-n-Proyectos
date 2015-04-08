<hr />
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-4">
                <h3 style="margin:0px;padding:0px;">Productos</h3>
                <?php echo form_open('sitio/tabla');?>
                  <ul class="tupla">
                      <li><button type="button" name="agregar"  class="btn btn-default btn-xs">Agregar</button></li>
                      <li><button type="button" name="modificar"  class="btn btn-default btn-xs">Modificar</button></li>
                      <li><button type="button" name="eliminar"  class="btn btn-default btn-xs">Eliminar</button></li>
                  </ul>  
                <!-- final del form despues de tabla -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">       
            <div class="col-md-8">
                <table class="table table-bordered" >
                    <tr><th colspan="2">titulo</th><th>contenido</th><th colspan="2">acción</th></tr>
               <?php foreach ($notas as $news_item): ?>
                   <tr>
                       <td><input type="checkbox" name="<?php echo $news_item['id_nota']?>" /></td>
                       <td><?php echo word_limiter($news_item['titulo'],2);?></td>
                       <td><?php echo word_limiter($news_item['texto'],3); ?></td>
                       <td><a href="create/<?php echo $news_item['id_nota'];?>">Editar</a></td>
                       <td><a href="del/<?php echo $news_item['id_nota'];?>">Eliminar</a></td>
                       
                   </tr> 
               <?php endforeach ?>
               </table>
               </form>
            </div>
            <div class="col-md-4">
                <?php echo validation_errors(); ?>
                <?php echo form_open('sitio/create') ?>
                  <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input name="titulo" type="text" <?php if(isset($nota)){?>value="<?php echo $nota['titulo'];?>"<?php }?> class="form-control" id="text" placeholder="Titulo">
                  </div>
                  <div class="form-group">
                    <label for="texto">Texto</label>
                    <textarea name="texto" class="form-control"><?php if(isset($nota)){echo $nota['texto'];}?></textarea>
                    <?php
                        if(isset($nota)){ 
                    ?>
                        <input type="hidden" name="id_nota" value="<?php echo $nota['id_nota'];?>" />
                    <?php
                        }
                    ?>
                  </div>
                  <button type="submit" class="btn btn-default">Guardar</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
