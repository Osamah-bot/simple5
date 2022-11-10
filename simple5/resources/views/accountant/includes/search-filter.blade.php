<form action="{{route('admin.searchpatient')}}" method="POST">
@csrf
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text"  name="patientid" id='patientid' class="form-control floating">
								<label class="focus-label">Patient ID</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Patient Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
							      	<option>All  </option>
									<option>a  </option>
									<option>b</option>
									<option>c</option>
								</select>
								<label class="focus-label">Parients type</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<input type="submit" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div>
					</form>
