<div ng-controller='voteController as vc'>
<div class="row">
<div class="col-md-8">
    <div class="card">
    <div class="header">
    <h4 class="title">Current Election</h4>
    </div>
    <div class="content">
    <div class="row">
      <div class="col-md-12">
      <label for="url"><h4> Register Voters</h4></label>
      <div class="input-group">
      <input type="text" class="form-control" name="url" value="localhost/evote.com/registration.php"/>
      <span class="input-group-btn">
      <form action="registration.php" target="_blank">
      <input type="submit" class="btn btn-default" value="Go!"/>
      </form>
      </span>
    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <label for="url"><h4> Start Election</h4></label>
      <div class="input-group">
      <input type="text" class="form-control" name="url" value="localhost/design/vote.php"/>
      <span class="input-group-btn">
      <form action="vote.php" target="_blank">
      <input type="submit" class="btn btn-default" value="Go!"/>
      </form>
      </span>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>

<div class="col-md-4">
<div class="card">
<div class="header">
<h4 class="title">View Results</h4>
</div>
<div class="content">
<form action="chart.php" method="GET" target="_blank">
<div ng-repeat='position in positions'>
<div class="row">
<div class="col-md-12">
<label style="margin: 10px"><h5>{{position.title}}</h5></label>
<button type="submit" class="btn btn-info btn-fill pull-right" name="view" value="{{position.title}}">See Results</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-8">
    <div class="card">
    <div class="header">
    <h4 class="title">Create New Election</h4>
    </div>
    <div class="content">
    <div class="row">
      <div class="col-md-12">
      <label for="url"><h4>Reset All?</h4></label>
      <form action="backend/export.php">
      <input type="submit" class="btn btn-info btn-fill" value="Create New Election"/>
      </form>
      <label for="url"><h4>Restore Previous Election</h4></label>
      <form action="backend/export.php">
      <input type="submit" class="btn btn-info btn-fill" value="Restore"/>
      </form>
    </div>
    </div>
    </div>
    </div>
</div>
</div>
</div>
