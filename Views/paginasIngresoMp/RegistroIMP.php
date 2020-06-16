<section class="row">
    <div id="blanco" class="col-lg-10">
        <h1 id="tlprin">Ingreso de Materia Prima</h1>
    </div>
</section>
<section class="row">
    <aside id="blanco-h" class="col-lg-2"></aside>
    <aside class="col-lg-8">
        <div class="row py-3">
            <aside class="col-lg-3 py-5" id="fondo2"></aside>
            <form class="col-lg-6 py-5 needs-validation" id="form" method="POST" novalidate>
                <a href="index.php?paginasIngresoMP=ConsultaIMP" class="btn btn-danger rounded float-left" title="Volver"><i class="fas fa-angle-double-left"></i></a>
                <h1 class="text-danger">Nuevo Ingreso</h1>

                <div class="form-group row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Materia Prima</label>
                            <center> <select name="idMP_FK" id="mps" class="form-control">
                                    <option value="">Seleccione..</option>
                                    <?php
                                    foreach ($mps as $mp) {
                                    ?>
                                        <option value="<?php echo $mp['idMP'] ?>"><?php echo $mp['nombreMP'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select></center>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control rounded-pill" placeholder="Cantidad" id="cant" name="cantidadDI" min="0" required>
                            <div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <button id="add" class="btn btn-success mt-4">+</button>
                    </div>
                </div>

                <section class="col-md-12 flex-nowrap table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>MP</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="list-mps">

                        </tbody>
                    </table>
                </section>

                <div class="modal-footer">

                    <button id="submit" class="btn btn-success">Agregar</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
        </div>
        </form>

        </div>


    </aside>

    <aside id="blanco-h" class="col-lg-2"></aside>
</section>