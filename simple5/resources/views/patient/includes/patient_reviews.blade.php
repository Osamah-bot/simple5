 <!-- Projects Tab -->
 <div id="#" class="tab-pane fade show active">
     <div class="row">
         <div style="margin-inline-start:10%; width:80%;">

             <table class="table table-striped custom-table ">
                 <thead>
                     <tr style="background:#d2dbdd">
                         <th>Review</th>
                         <th>Reason</th>
                         <th>Room </th>
                         <th>Date</th>
                         <th>Statuss</th>
                         <th class="text-right">Action</th>
                     </tr>
                 </thead>
                 @foreach ($pat_reviw[$appo_id] as $p_review)
                     <tbody>

                         <td>REV-00{{ $p_review->review_id }}</td>
                         <td>{{ $p_review->review_reason }}</td>
                         <td>{{ $p_review->room_id }}</td>
                         <td>{{ $p_review->review_date }}</td>
                         <td>
                             <div class="dropdown action-label">
                                 <a href="#" class="btn btn-white btn-sm btn-rounded "
                                     data-toggle="dropdown" aria-expanded="false">
                                     @if ($p_review->review_state == 'Accepted')
                                         <i class="fa fa-dot-circle-o text-success"></i>
                                         {{ $p_review->review_state }}
                                 </a>
                             @elseif($p_review->review_state == 'Rejected')
                                 <i class="fa fa-dot-circle-o text-danger"></i>
                                 {{ $p_review->review_state }} </a>
                             @elseif($p_review->review_state == 'Pending')
                                 <i class="fa fa-dot-circle-o text"></i>
                                 {{ $p_review->review_state }} </a>
                             @elseif($p_review->review_state == 'Completed')
                                 <i class="fa fa-circle text"></i>
                                 {{ $p_review->review_state }} </a>
                             @else
                                 <i class="fa fa-dot-circle-o "></i>
                                 !!?{{ __('Unknown') }} </a>
                 @endif

         </div>
         </td>
         <td>action</td>

         </tbody>
         @endforeach
         </table>

         {{-- <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
											<div class="card">
												<div class="card-body">
													<div class="dropdown profile-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
														</div>
													</div>
													<h4 class="project-title"><a href="project-view.html">{{$p_review->review_id}} Office Management</a></h4>
													<small class="block text-ellipsis m-b-15">
														<span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
														<span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
													</small>
													<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
														typesetting industry. When an unknown printer took a galley of type and
														scrambled it...
													</p>
													<div class="pro-deadline m-b-15">
														<div class="sub-title">
															Deadline:
														</div>
														<div class="text-muted">
															17 Apr 2019
														</div>
													</div>
													<div class="project-members m-b-15">
														<div>Project Leader :</div>
														<ul class="team-members">
															<li>
																<a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
															</li>
														</ul>
													</div>
													<div class="project-members m-b-15">
														<div>Team :</div>
														<ul class="team-members">
															<li>
																<a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
															</li>
															<li>
																<a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
															</li>
															<li>
																<a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
															</li>
															<li>
																<a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
															</li>
															<li class="dropdown avatar-dropdown">
																<a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<div class="avatar-group">
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-02.jpg">
																		</a>
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-09.jpg">
																		</a>
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-10.jpg">
																		</a>
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-05.jpg">
																		</a>
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-11.jpg">
																		</a>
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-12.jpg">
																		</a>
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-13.jpg">
																		</a>
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-01.jpg">
																		</a>
																		<a class="avatar avatar-xs" href="#">
																			<img alt="" src="assets/img/profiles/avatar-16.jpg">
																		</a>
																	</div>
																	<div class="avatar-pagination">
																		<ul class="pagination">
																			<li class="page-item">
																				<a class="page-link" href="#" aria-label="Previous">
																					<span aria-hidden="true">«</span>
																					<span class="sr-only">Previous</span>
																				</a>
																			</li>
																			<li class="page-item"><a class="page-link" href="#">1</a></li>
																			<li class="page-item"><a class="page-link" href="#">2</a></li>
																			<li class="page-item">
																				<a class="page-link" href="#" aria-label="Next">
																					<span aria-hidden="true">»</span>
																				<span class="sr-only">Next</span>
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</li>
														</ul>
													</div>
													<p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
													<div class="progress progress-xs mb-0">
														<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
													</div>
												</div>
											</div>
										</div> --}}


     </div>
     <!-- <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
           <div class="card">
            <div class="card-body">
             <div class="dropdown profile-action">
              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
              <div class="dropdown-menu dropdown-menu-right">
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
              </div>
             </div>
             <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
             <small class="block text-ellipsis m-b-15">
              <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
              <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
             </small>
             <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
              typesetting industry. When an unknown printer took a galley of type and
              scrambled it...
             </p>
             <div class="pro-deadline m-b-15">
              <div class="sub-title">
               Deadline:
              </div>
              <div class="text-muted">
               17 Apr 2019
              </div>
             </div>
             <div class="project-members m-b-15">
              <div>Project Leader :</div>
              <ul class="team-members">
               <li>
                <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
               </li>
              </ul>
             </div>
             <div class="project-members m-b-15">
              <div>Team :</div>
              <ul class="team-members">
               <li>
                <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
               </li>
               <li>
                <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
               </li>
               <li>
                <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
               </li>
               <li>
                <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
               </li>
               <li class="dropdown avatar-dropdown">
                <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                <div class="dropdown-menu dropdown-menu-right">
                 <div class="avatar-group">
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-02.jpg">
                  </a>
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-09.jpg">
                  </a>
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-10.jpg">
                  </a>
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-05.jpg">
                  </a>
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-11.jpg">
                  </a>
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-12.jpg">
                  </a>
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-13.jpg">
                  </a>
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-01.jpg">
                  </a>
                  <a class="avatar avatar-xs" href="#">
                   <img alt="" src="assets/img/profiles/avatar-16.jpg">
                  </a>
                 </div>
                 <div class="avatar-pagination">
                  <ul class="pagination">
                   <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                     <span aria-hidden="true">«</span>
                     <span class="sr-only">Previous</span>
                    </a>
                   </li>
                   <li class="page-item"><a class="page-link" href="#">1</a></li>
                   <li class="page-item"><a class="page-link" href="#">2</a></li>
                   <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                     <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                    </a>
                   </li>
                  </ul>
                 </div>
                </div>
               </li>
              </ul>
             </div>
             <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
             <div class="progress progress-xs mb-0">
              <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
             </div>
            </div>
           </div>
          </div>
          -->


 </div>
 </div>
 {{-- <hr style="height:10px; width:100%; border-width:1ch; color:rgb(80, 32, 209); background-color:rgb(26, 14, 192)"> --}}
 <!-- /Projects Tab -->
