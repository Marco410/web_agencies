<?php $page="service-details";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="section-header text-center">
							<h2>Book Service</h2>
						</div>
						<form>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Service Location <span class="text-danger">*</span></label>
										<input class="form-control" type="text" placeholder="Enter a location" autocomplete="off">
									</div>                            
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Service amount</label>
										<input class="form-control" type="text" value="$100" readonly>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
										<label>Date <span class="text-danger">*</span></label>
										<input class="form-control hasDatepicker" type="text">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Time slot <span class="text-danger">*</span></label>
										<select class="form-control">
											<option>10:00 AM</option>
											<option>11:00 AM</option>
											<option>12:00 PM</option>
											<option>01:00 PM</option>
											<option>02:00 PM</option>
											<option>03:00 PM</option>
											<option>04:00 PM</option>
											<option>05:00 PM</option>
											<option>06:00 PM</option>
											<option>07:00 PM</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="text-center">
											<div id="load_div"></div>
										</div>
										<label>Notes</label>
										<textarea class="form-control" rows="5"></textarea>
									</div>
								</div>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" type="submit">Continue to Book</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>﻿
			</div>
	   @endsection
	  