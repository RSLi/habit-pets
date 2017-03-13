<link href="/css/custom.css" rel="stylesheet" type="text/css" >

<style>
body {
	background-color: #f2efe8;
}
</style>

<script>
	udata = <?php echo $udata?>;
	path = "<?php echo site_url('users_main/update_json')?>";
</script>


<div class="container-fluid">
   <div class="col-md-4 threeSection">
	<div>
	  <img  class = "petImage" src="/images/dog1.png"/><br>
	  <a href="http://www.freepik.com/free-photos-vectors/house" style="font-size: 80%">Avatar designed by Freepik</a>

	</div>
	<br>
	<div id = "col1box2">
	  <h4 id="petname"></h4>
	  <h4>Level: <span class="badge" id="petlevel"></span></h4>

	  <div class="row">
		  <div class="col col-md-3" id="sameAsH4">
			<span class="badge">Exp.</span>
		  </div>
		  <div class="col col-md-9" id="exp">
			<div class="progress" style="width:90%">
				<div class="progress-bar progress-bar-info" id="exp-progress" role="progressbar" aria-valuenow=70
			  aria-valuemin="0" aria-valuemax="100" style="width:40%; display:inline;">
				  <span class="sr-only">needtofill</span>
				</div>
			</div>
		  </div>
		</div>

	</div>


	<div id = "col1box3">
	  <div class="row">
		  <div class="col col-md-3" id="sameAsH4">
			<span class="badge">Food</span>
		  </div>
		  <div class="col col-md-9" id="exp">
			<div class="progress" style="width:90%">
				<div class="progress-bar progress-bar-warning" id="food-progress" role="progressbar" aria-valuenow=70
			  aria-valuemin="0" aria-valuemax="100" style="width:70%; display:inline;">
				  70%
				</div>
			</div>
		  </div>
		</div>

		<div class="row">
			<div class="col col-md-3" id="sameAsH4">
			  <span class="badge">Health</span>
			</div>
			<div class="col col-md-9" id="exp">
			  <div class="progress" style="width:90%">
				  <div class="progress-bar progress-bar-success" id="health-progress" role="progressbar" aria-valuenow=70
				aria-valuemin="0" aria-valuemax="100" style="width:70%; display:inline;">
					<span class="sr-only">needtofill</span>
				  </div>
			  </div>
			</div>
		  </div>

		  <div class="row">
			  <div class="col col-md-3" id="sameAsH4">
				<span class="badge">Happiness</span>
			  </div>
			  <div class="col col-md-9" id="exp">
				<div class="progress" style="width:90%">
					<div class="progress-bar progress-bar-danger" id="happiness-progress" role="progressbar" aria-valuenow=70
				  aria-valuemin="0" aria-valuemax="100" style="width:70%; display:inline;">
					  <span class="sr-only">needtofill</span>
					</div>
				</div>
			  </div>
		  </div>

		  <div id = "col1box4"><!--TODO: move money position -->
			<p><i class="fa fa-money fa-2x" aria-hidden="true" id="gold"></i></span></p>
		  </div>

	</div>
	</div>






	<div class="col-md-4 threeSection">
	   <h3>Daily Task</h3>
	  <div class="panel panel-success">
		  <div class="panel-heading" style="height:40px;"><span>Food</span><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" style="float:right">
   		 <span class="glyphicon glyphicon-plus-sign"></span>
   	   </button></div>
		  <div class="panel-body" >

			<!-- <form class="form-inline">
				<div class="input-group" style="font-size:12pt;height:30px;width:390px;">
				  <input type="text" class="form-control" id="input-form-add-dailies-food" placeholder="Add More">
				  <span class="input-group-btn">
					<button id="btn-form-add-dailies-food" class="btn btn-default">Go!</button>
				  </span>
				</div>
			</form> -->



	  <ul class="list-group" id='try1'>
	  </ul>


	  </div>
	  </div>

	  <div class="panel panel-danger">
		  <div class="panel-heading" style="height:40px;"><h4>Health</h4></div>
		  <div class="panel-body">

			<!-- <form class="form-inline">
				  <div class="input-group" style="font-size:12pt;height:30px;width:390px;">
					<input type="text" class="form-control" placeholder="Add More" id="input-form-add-dailies-health">
					<span class="input-group-btn">
					  <button id="btn-form-add-dailies-health" class="btn btn-default">Go!</button>
					</span>
				  </div>
			 </form>
 -->

	  <ul class="list-group" id='try2'>
	  </ul>

	  </div>
	  </div>



  <div class="panel panel-primary">
		  <div class="panel-heading" style="height:40px;"><h4>Happiness</h4></div>
		  <div class="panel-body">
			<!-- <form class="form-inline">
			  <div class="input-group" style="font-size:12pt;height:30px;width:390px;">
				<input type="text" class="form-control" placeholder="Add More" id="input-form-add-dailies-happiness">
				<span class="input-group-btn">
				  <button id="btn-form-add-dailies-happiness" class="btn btn-default">Go!</button>
				</span>
			  </div>

			</form> -->


	  <ul class="list-group" id='try3'>
	  </ul>

	  </div>
	  </div>
	  </div>



  <div class="col-md-4 threeSection">
	 <div class="panel panel-info">
	  <div class="panel-heading"><h4>Inventory</h4></div>
	  <div class="panel-body">
		<div class="row">
			<div class="col col-md-2">
			  <span class="badge">Food</span>
			</div>
			<div class="col col-md-10">
			  <div id="inventory"></div>

			</div>
		</div>
	  </div>
	</div>


   <h3>To-Do List</h3>
   <div class="panel panel-default">

	 <div class="panel-heading" style="height:40px;" id="addtask"><span style="font-size:14pt;height:30px;width:360px;">Tasks</span>
	   <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" style="float:right">
		 <span class="glyphicon glyphicon-plus-sign"></span>
	   </button>
	 </div>


	 <div class="modal fade" id="myModal" role="dialog">
	   <div class="modal-dialog">

	 <!-- Modal content-->
	   <div class="modal-content">
		   <div class="modal-header">
			 <button type="button" class="close" data-dismiss="modal">&times;</button>
			 <h4 class="modal-title">Make your new task</h4>
		   </div>

		 <div class="modal-body">
		   <form>
			 <div class="form-group">
			   <label>Task name:</label>
			   <input class="form-control" id="input-form-add-todo" placeholder="Please enter your new task here">
			 </div>

			 <div class="form-group">
			   <label for="select-form-add-task">Type: (please select one)</label>
				 <select id="select-form-add-task" class="form-control">
				   <option value="todo">To-do Task</option>
				   <option value="dailies">Daily Task</option>
				 </select>
			 </div>

			 <div class="form-group">
			   <label for="select-form-add-todo">Reward: (please select one)</label>
				 <select id="select-form-add-todo" class="form-control">
				   <option value="food">Food</option>
				   <option value="health">Health</option>
				   <option value="happiness">Happiness</option>
				 </select>
			 </div>

		   </form>
		 </div>


		 <div class="modal-footer">
		 <button id="btn-form-add-todo" class="btn btn-default">Submit</button>
		 </div>
	 </div>

   </div>
 </div>



	 <div class="panel-body" style="height:470px;">

	   <ul class="list-group" id="creattask">

	   </ul>

	 </div>

  </div>
  </div>
</div>

<script src="/js/udata_json_util.js"></script>
<script src="/js/udata_process.js"></script>
