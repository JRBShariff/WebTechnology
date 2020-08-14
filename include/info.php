<div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 gutter">
                            <div class="sales">
                                <h2>Books</h2>

                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg dropdown-toggle">
                                        <span>NO:</span> 
										<?php
											$sq="SELECT count(*)from books";
											$result = $conn->query($sq); 
											echo $number_of_rows = $result->fetchColumn(); 
										?>
                                    </button>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 gutter">
                            <div class="sales">
                                <h2>Borrowed</h2>

                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg dropdown-toggle" >
                                        <span>No:</span>
										<?php
											$sq="SELECT count(*)from stu_books where Book_Status='borrowed'";
											$result = $conn->query($sq); 
											echo $number_of_rows = $result->fetchColumn(); 
										?>
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
						
                        <div class="col-md-4 col-sm-4 col-xs-12 gutter">
                            <div class="sales">
                                <h2>Returned</h2>

                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg" >
                                        <span>No:</span>
										<?php
											$sq="SELECT count(*) from stu_books where Book_Status='returned'";
											$result = $conn->query($sq); 
											echo $number_of_rows = $result->fetchColumn(); 
										?>
                                    </button>
                                </div>
                            </div>
                        </div>
						
						
                    </div>