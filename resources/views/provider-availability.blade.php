<?php $page="provider-availability";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						<div class="mb-4">
							<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
								<img alt="profile image" src="assets/img/provider/provider-01.jpg" class="avatar-lg rounded-circle">
								<div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
									<h6 class="mb-0">Thomas Herzberg</h6>
									<p class="text-muted mb-0">Member Since Apr 2020</p>
								</div>
							</div>
						</div>
						<div class="widget settings-menu">
							<ul>
								<li class="nav-item">
									<a href="provider-dashboard" class="nav-link">
										<i class="fas fa-chart-line"></i> <span>Dashboard</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="my-services" class="nav-link">
										<i class="far fa-address-book"></i> <span>My Services</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-bookings" class="nav-link">
										<i class="far fa-calendar-check"></i> <span>Booking List</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-settings" class="nav-link">
										<i class="far fa-user"></i> <span>Profile Settings</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-wallet" class="nav-link">
										<i class="far fa-money-bill-alt"></i> <span>Wallet</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-subscription" class="nav-link">
										<i class="far fa-calendar-alt"></i> <span>Subscription</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-availability" class="nav-link active">
										<i class="far fa-clock"></i> <span>Availability</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-reviews" class="nav-link">
										<i class="far fa-star"></i> <span>Reviews</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-payment" class="nav-link">
										<i class="fas fa-hashtag"></i> <span>Payment</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-9 col-md-8">
						<div class="card mb-0">
							<div class="card-body">
								<form>
									<div class="form-group">
										<p>Availability <span class="text-danger">*</span>
										</p>
										<div class="row">
											<div class="col-md-12">
												<div class="table-responsive">
													<table class="table availability-table">
														<tbody>
															<tr>
																<td>
																	<input type="checkbox" class="mr-1"> All Days
																</td>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
															<!-- monday -->
															<tr>
																<td>
																	<input type="checkbox" class="mr-1"> Monday
																</td>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
															
															<!-- tuesday -->
															
															<tr>
																<td>
																	<input type="checkbox" class="mr-1"> Tuesday
																</td>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
															<!-- wednesday -->
															
															<tr>
																<td>
																	<input type="checkbox" class="mr-1"> Wednesday
																</td>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
															<!-- thursday -->
															
															<tr>
																<td>
																	<input type="checkbox" class="mr-1"> Thursday
																</td>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
															<!-- friday -->
															
															<tr>
																<td>
																	<input type="checkbox" class="mr-1"> Friday
																</td>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
															<!-- saturday -->
															
															<tr>
																<td>
																	<input type="checkbox" class="mr-1"> Saturday
																</td>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
															<!-- sunday -->
															
															<tr>
																<td>
																	<input type="checkbox" class="mr-1"> Sunday
																</td>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control">
																			<option>Select Time</option>
																			<option>00:00 AM</option>
																			<option>01:00 AM</option>
																			<option>02:00 AM</option>
																			<option>03:00 AM</option>
																			<option>04:00 AM</option>
																			<option>05:00 AM</option>
																			<option>06:00 AM</option>
																			<option>07:00 AM</option>
																			<option>08:00 AM</option>
																			<option>09:00 AM</option>
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
																			<option>08:00 PM</option>
																			<option>09:00 PM</option>
																			<option>10:00 PM</option>
																			<option>11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-section text-right">
										<button class="btn btn-primary submit-btn" type="submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>﻿
			</div>﻿
</div>
@endsection