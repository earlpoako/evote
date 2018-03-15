<div class="row">
<div class="col-md-8">
  <div class="card">
    <div class="header">
      <h4 class="title"> Add Candidate </h4>
    </div>
    <div class="content">
      <form action="../evote.com/backend/addCandidate.php" method="POST">
        <div class="row">
          <div class="col-md-12">
            <label>Full Name</label>
            <input type="text" class="form-control" name="candidate_name" placeholder="Candidate's Full Name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label>Position</label>
            <input type="text" class="form-control" name="candidate_position" placeholder="Candidate's Position">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label>Political Party</label>
            <input type="text" class="form-control" name="candidate_party" placeholder="Candidate's Political Party">
          </div>
        </div>
        <input type="submit" class="btn btn-info btn-fill pull-right" value="Add Candidate">
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="card">
    <div class="header">
      <h4 class="title"> Add Position </h4>
    </div>
    <div class="content">
      <form action="../evote.com/backend/createTitle.php" method="POST">
        <div class="row">
          <div class="col-md-12">
            <label> Name/Title </label>
            <input type="text" class="form-control" name="position" placeholder="Position Name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label> Description </label>
            <input type="text" class="form-control" name="desc" placeholder="Position Description (Vote for One)">
          </div>
        </div>
        <input type="submit" class="btn btn-info btn-fill pull-right" value="Add Position">
        <div class="clearfix"></div>
      </form>
  </div>
</div>
</div>
