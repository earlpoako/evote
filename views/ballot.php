<div ng-controller='voteController as vc'>
<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="header">
      <h4 class="title"> Sample Ballot </h4>
    </div>
    <div class="content">
    </div>
  </div>
</div>
</div>
<div ng-repeat='position in positions'>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="header">
        <h4 class="title">{{position.title}}</h4>
        <p class="category">{{position.descr}}</p>
      </div>
      <div class="content">
        <div class="table-full-width">
          <form>
          <table class="table">
            <tbody>
              <tr ng-repeat='item in candidates'ng-if='item.position==position.title'>
                <td><input type="radio" class="option-input" name="president"><label style="margin: 10px"><h4>{{item.id}} {{item.name}}, {{item.party}}</h4></label></td>
              </tr>
            </tbody>
        </table>
        </form>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
</div>
