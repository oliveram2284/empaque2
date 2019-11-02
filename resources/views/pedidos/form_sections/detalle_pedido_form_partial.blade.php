<fieldset>
    <legend class="form">Bobinado</legend>
    <div class="row">
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_bobinado">Sentido</label>
                <select id="input_bobinado" name="bobinado" class="form-control">
                    <option value="2" selected="">Ninguno</option>
                    <option value="1">De Pie</option>
                    <option value="0">De Cabeza</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_fuera">Tratado</label>
                <select id="input_fuera" name="fuera" class="form-control">
                    <option value="2" selected="">Ninguno</option>
                    <option value="1">Por Fuera</option>
                    <option value="0">Por Dentro</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_distancia">Dist. de Taco</label>
                <input type="text" id="input_distancia" name="distancia" class="form-control" placeholder="Distancia" >
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group text-left">
                <label class="form-label" for="input_bobina">Diam. Bobina</label>
                <input type="text" id="input_bobina" name="bobina" class="form-control" placeholder="Diam. Bobina" >
                
            </div>
        </div>
        <div class="col-3">
            <div class="form-group text-left">
                <label class="form-label" for="input_canuto">Diam. Canuto</label>
                <input type="text" id="input_canuto" name="canuto" class="form-control" placeholder="Diam. Canuto"  >
            </div>
        </div>
        <div class="col-3">
            <div class="form-group text-left">
                <label class="form-label" for="input_kgBobina">Kg. Bobina</label>
                <input type="text" id="input_kgBobina" name="kgBobina" class="form-control" placeholder="Kg. Bobina"  >
            </div>
        </div>
        <div class="col-3">
            <div class="form-group text-left">
                <label class="form-label" for="input_mtsBobina">Mts Bobina</label>
                <input type="text" id="input_mtsBobina" name="mtsBobina" class="form-control" placeholder="Mts Bobina"  >
            </div>
        </div>
    </div>
    
</fieldset>
    
<fieldset>
    <legend class="form">Datos Impresión</legend>
    <div class="row">
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_caras">Caras</label>
                <select id="input_caras" name="caras" class="form-control">
                        <option selected>Seleccionar</option>
                        <option value="0">Sin Impresión</option>
                        <option value="1">1 Cara</option>
                        <option value="2">2 Caras</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_centrada">Tipo Imp</label>
                <select id="input_centrada" name="centrada" class="form-control">
                    <option selected>Seleccionar</option>
                    <option value="2">Ningúna</option>
                    <option value="1">Centrada</option>
                    <option value="0">Corrida</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_tipo">Horientación</label>
                <select id="input_tipo" name="tipo" class="form-control">
                    <option selected>Seleccionar</option>
                    <option value="2">Ninguna</option>
                    <option value="1">Apaisada</option>
                    <option value="0">Común</option>
                </select>
            </div>
        </div>
    </div>
    
</fieldset>

<fieldset>
    <legend class="form">Descripción Laminado</legend>

    <div class="row">        
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_bilaminado1"> Lamina 1 Material</label>
                <select id="input_bilaminado1" name="bilaminado[]" class="form-control">
                        <option selected>Seleccionar</option>
                        <option value="0">Sin Impresión</option>
                        <option value="1">1 Cara</option>
                        <option value="2">2 Caras</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_material1">Color</label>
                <select id="input_material1" name="material[]" class="form-control">
                        <option value="1">Selecc.</option>
                        <option value="14">CRISTAL</option>
                        <option value="13">BLANCO</option>
                        <option value="12">METALIZADO</option>
                        <option value="10">CRISTAL MATE</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_micronaje1">Micronaje</label>
                <input type="text" id="input_micronaje1" name="micronaje[]" class="form-control" placeholder="Micronaje"  >
            </div>
        </div>
    </div>

    <div class="row">        
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_bilaminado2"> Lamina 2 Material</label>
                <select id="input_bilaminado2" name="bilaminado[]" class="form-control">
                        <option selected>Seleccionar</option>
                        <option value="0">Sin Impresión</option>
                        <option value="1">1 Cara</option>
                        <option value="2">2 Caras</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_material2">Color</label>
                <select id="input_material2" name="material[]" class="form-control">
                    <option value="1">Selecc.</option>
                    <option value="14">CRISTAL</option>
                    <option value="13">BLANCO</option>
                    <option value="12">METALIZADO</option>
                    <option value="10">CRISTAL MATE</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group text-left">
                <label class="form-label" for="input_micronaje2">Micronaje</label>
                <input type="text" id="input_micronaje2" name="micronaje[]" class="form-control" placeholder="Micronaje"  >
            </div>
        </div>
    </div>

    <div class="row">        
            <div class="col-4">
                <div class="form-group text-left">
                    <label class="form-label" for="input_bilaminado3"> Lamina 3 Material</label>
                    <select id="input_bilaminado3" name="bilaminado[]" class="form-control">
                            <option selected>Seleccionar</option>
                            <option value="0">Sin Impresión</option>
                            <option value="1">1 Cara</option>
                            <option value="2">2 Caras</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    <label class="form-label" for="input_material3">Color</label>
                    <select id="input_material3" name="material[]" class="form-control">
                        <option value="1">Selecc.</option>
                        <option value="14">CRISTAL</option>
                        <option value="13">BLANCO</option>
                        <option value="12">METALIZADO</option>
                        <option value="10">CRISTAL MATE</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group text-left">
                    <label class="form-label" for="input_micronaje3">Micronaje</label>
                    <input type="text" id="input_micronaje3" name="micronaje[]" class="form-control" placeholder="Micronaje"  >
                </div>
            </div>
        </div>

</fieldset>

<fieldset>
    <legend class="form">Observación</legend>
    <div class="row">
        <div class="col">
            <div class="form-group text-left">
                <label class="form-label" for="input_micronaje2">Observación</label>
                <textarea class="form-control adjustable-textarea" placeholder="Observación" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;">

                </textarea>
            </div>
        </div> 
    </div>
</fieldset>
    