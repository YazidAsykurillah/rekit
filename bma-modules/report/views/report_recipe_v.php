<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="control-label col-lg-4">Recipe Name</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <span class="input-group-addon mandatory"><i class="fa fa-bookmark"></i></span>
                                <select name="recipe_id"
                                        data-ajax="true" 
                                        data-placeholder="Select Recipe Name..."
                                        data-url="recipe/recipe_editor/getRecipe/" 
                                        data-value="" 
                                        data-limit="100"
                                        id="recipe_id" placeholder="Recipe Name"  class='form-control select2'>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                </div>
                <div class="col-md-4">
                    <p>Please select recipe first.</p>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><i class="fa fa-bookmark"></i> Detail Recipe</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                
            </div>
        </div>
    </div>
</div>
