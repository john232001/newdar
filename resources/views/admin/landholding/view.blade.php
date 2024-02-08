@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')
@include('admin.admin_sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
          <div class="row">   
            <div class="col-xs-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">BASIC INFORMATION</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                      @foreach ($landholdings as $data)
                                      <div class="col-lg-4 col-md-4 col-sm-4">
                                          <strong>LANDHOLDING ID:</strong><span class="text-success"> {{ $data->lhid }}</span><br>
                                          <strong>LANDOWNER:</strong><span class="text-success"> {{ $data->firstname }} {{ $data->middlename }} {{ $data->familyname }}</span><br>
                                          <strong>OCT/TCT NUMBER:</strong><span class="text-success"> {{ $data->octNo }}</span><br>
                                          <strong>SURVEY NUMBER:</strong><span class="text-success"> {{ $data->surveyNo }}</span><br>
                                          <strong>LOT NUMBER:</strong><span class="text-success"> {{ $data->lotNo }}</span><br>
                                          <strong>TITLE/SURVEY AREA:</strong><span class="text-success"> {{ $data->surveyArea }}</span><br>
                                          <strong>TAX DECLARATION NUMBER: </strong><span class="text-success"> {{ $data->taxNo }}</span><br>
                                          <strong>MODE OF ACQUISITION:</strong><span class="text-success"> {{ $data->modeOfAcquisition }}</span>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-4">
                                          <strong>COVERABLE AREA:</strong><span class="text-success"> {{ $data->coverableArea }}</span><br>
                                          <strong>CARPABLE AREA:</strong><span class="text-success"> {{ $data->carpableArea }}</span><br>
                                          <strong>NON-CARPABLE AREA:</strong><span class="text-success"> {{ $data->noncarpableArea }}</span><br>
                                          <strong>RETAINED AREA:</strong><span class="text-success"> {{ $data->retainedArea }}</span><br>
                                          <strong>DISTRIBUTED AREA:</strong><span class="text-success"> {{ $data->distributeArea }}</span><br>
                                          <strong>LAND SIZE:</strong><span class="text-success"> {{ $data->landsize }}</span><br>
                                          <strong>PHASE:</strong><span class="text-success"> {{ $data->phase }}</span><br>
                                          <strong>UPALS:</strong><span class="text-success"> {{ $data->upals }}</span><br>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-4">
                                          <strong>MAJOR CROPS AREA:</strong><span class="text-success"> {{ $data->majorCrops }}</span><br>
                                          <strong>YEAR ADDED:</strong><span class="text-success"> {{ $data->yearAdded }}</span><br>
                                          <strong>PIPE LINE:</strong><span class="text-success"> {{ $data->pipeline }}</span><br>
                                          <strong>TARGET YEAR:</strong><span class="text-success"> {{ $data->targetyear }}</span><br>
                                          <strong>PROJECTED DELIVERY:</strong><span class="text-success"> {{ $data->projectedDelivery }}</span><br>
                                      </div>
                                  @endforeach
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <div class="row">
            <!-- ./col -->
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addarb">
                      <i class="fa fa-plus"></i> ADD ARB
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>FIRST NAME</th>
                          <th>LAST NAME</th>
                          <th>MIDDLE INITIAL</th>
                          <th>EXTENSION</th>
                          <th>SPOUSE NAME</th>
                          <th>DATE OF BIRTH</th>
                          <th>GENDER</th>
                          <th>ADDRESS</th>
                          <th>OWNERSHIP PREFERENCE</th>
                          <th>DATE OF OATHTAKING</th>
                          <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($arb as $data)
                          <tr>
                              <td>{{ $data->fname }}</td>
                              <td>{{ $data->lname }}</td>
                              <td>{{ $data->mname }}</td>
                              <td>{{ $data->extension }}</td>
                              <td>{{ $data->spousename }}</td>
                              <td>{{ $data->datebirth }}</td>
                              <td>{{ $data->gender }}</td>
                              <td>{{ $data->address }}</td>
                              <td>{{ $data->ownership}}</td>
                              <td>{{ $data->dateOfOath }}</td>
                              <td>
                                  <a href="" data-toggle="modal" data-target="#editarb{{ $data->id }}">
                                      <button class="btn btn-primary btn-sm">
                                          <i class="fa fa-edit"></i> EDIT
                                      </button>
                                  </a>
                                  <a href="" data-toggle="modal" data-target="#deletearb{{ $data->id }}">
                                      <button class="btn btn-danger btn-sm" >
                                          <i class="fa fa-trash"></i> DELETE
                                      </button>
                                  </a>
                              </td>
                          </tr>
                          @include('admin.arb.edit')
                          @include('admin.arb.delete')
                      @endforeach
                  </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <!-- ./col -->
            <div class="col-xs-6">
              <div class="box box-success">
                <div class="box-header with-border">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addlot">
                    <i class="fa fa-plus"></i> ADD LOT
                  </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="lottable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>ARB NAME</th>
                          <th>LOT NUMBER</th>
                          <th>LOT TYPE</th>
                          <th>LOT AREA</th>
                          <th>CROP</th>
                          <th>ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($lots as $data)
                    <tr>
                        <td>{{ $data->fname }} {{ $data->lname }}</td>
                        <td>{{ $data->lotNo}}</td>
                        <td>{{ $data->lotType}}</td>
                        <td>{{ $data->lotArea}}</td>
                        <td>{{ $data->crop}}</td>
                        <td>
                            <a href="" data-toggle="modal" data-target="#editlot{{ $data->id }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> EDIT
                                </button>
                            </a>
                            <a href="" data-toggle="modal" data-target="#deletelot{{ $data->id }}">
                                <button class="btn btn-danger btn-sm" >
                                    <i class="fa fa-trash"></i> DELETE
                                </button>
                            </a>
                        </td>
                    </tr>
                    @include('admin.lot.edit')
                    @include('admin.lot.delete')
                    @endforeach
                </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          <!-- ./col -->
          <div class="col-xs-6">
            <div class="box box-success">
              <div class="box-header with-border">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addsurvey">
                  <i class="fa fa-plus"></i> ADD SURVEY PLAN
                </button>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="surveyplan" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ASP NUMBER</th>
                        <th>ASP DATE APPROVED</th>
                        <th>ASP AREA</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($asp as $data)
                    <tr>
                      <td>{{ $data->aspNo}}</td>
                      <td>{{ $data->aspDate}}</td>
                      <td>{{ $data->aspArea}}</td>
                      <td>
                          <a href="" data-toggle="modal" data-target="#editmodalasp{{ $data->id }}">
                              <button class="btn btn-primary btn-sm">
                                  <i class="fa fa-edit"></i> EDIT
                              </button>
                          </a>
                          <a href="" data-toggle="modal" data-target="#deletemodalasp{{ $data->id }}">
                              <button class="btn btn-danger btn-sm" >
                                  <i class="fa fa-trash"></i> DELETE
                              </button>
                          </a>
                      </td>
                  </tr>
                  @include('admin.asp.edit')
                  @include('admin.asp.delete')
                @endforeach
              </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          </div>
          <div class="row">
            <!-- ./col -->
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmodalvaluation">
                    <i class="fa fa-plus"></i> ADD VALUATION
                  </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="valuation" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>LOT NUMBER</th>
                          <th>AOC NUMBER</th>
                          <th>LBP CLAIM NUMBER</th>
                          <th>AMOUNT</th>
                          <th>DATE TRANSMITTED TO LBP/AOC</th>
                          <th>DATE OF MOV</th>
                          <th>DATE NVLA SERVED TO LO</th>
                          <th>DATE OF FI</th>
                          <th>DATE of CF RECEIPT</th>
                          <th>TRANSMITTAL STATUS</th>
                          <th>ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($valuation as $data)
                          <tr>
                              <td>{{ $data->lotNo }}</td>
                              <td>{{ $data->aocNo }}</td>
                              <td>{{ $data->claimNo }}</td>
                              <td>{{ $data->amount }}</td>
                              <td>{{ $data->dateTransmitted }}</td>
                              <td>{{ $data->dateofMov }}</td>
                              <td>{{ $data->dateServed }}</td>
                              <td>{{ $data->dateofFI }}</td>
                              <td>{{ $data->dateofCF }}</td>
                              <td>{{ $data->transmittalStatus }}</td>
                              <td>
                                  <a href="" data-toggle="modal" data-target="#editmodalvaluation{{ $data->id }}">
                                      <button class="btn btn-primary btn-sm">
                                          <i class="fa fa-edit"></i> 
                                      </button>
                                  </a>
                                  <a href="" data-toggle="modal" data-target="#deletemodalvaluation{{ $data->id }}">
                                      <button class="btn btn-danger btn-sm" >
                                          <i class="fa fa-trash"></i>
                                      </button>
                                  </a>
                              </td>
                          </tr>
                          @include('admin.valuation.edit')
                          @include('admin.valuation.delete')
                      @endforeach
                  </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <!-- ./col -->
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmodalawardtitle">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="awardtitle" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>LOT NUMBER</th>
                          <th>FB/COLLECTIVE NAME</th>
                          <th>CLOA SERIAL #</th>
                          <th>AWARD TYPE</th>
                          <th>GENERATION DATE</th>
                          <th>CLOA EPEB #</th>
                          <th>CLOA EPEB DATE</th>
                          <th>REGISTERED DATE</th>
                          <th>AWARD TITLE #</th>
                          <th>DISTRIBUTION DATE</th>
                          <th>ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($awardtitle as $data)
                          <tr>
                              <td>{{ $data->lotNo }}</td>
                              <td>{{ $data->fbOrcname }}</td>
                              <td>{{ $data->serialNo }}</td>
                              <td>{{ $data->awardType }}</td>
                              <td>{{ $data->genDate }}</td>
                              <td>{{ $data->epebNo }}</td>
                              <td>{{ $data->epebDate }}</td>
                              <td>{{ $data->registerDate }}</td>
                              <td>{{ $data->awardtitleNo }}</td>
                              <td>{{ $data->distributeDate }}</td>
                              <td>
                                  <a href="" data-toggle="modal" data-target="#editawardtitle{{ $data->id }}">
                                      <button class="btn btn-primary btn-sm">
                                          <i class="fa fa-edit"></i>
                                      </button>
                                  </a>
                                  <a href="" data-toggle="modal" data-target="#deletemodalawardtitle{{ $data->id }}">
                                      <button class="btn btn-danger btn-sm" >
                                          <i class="fa fa-trash"></i>
                                      </button>
                                  </a>
                              </td>
                          </tr>
                          @include('admin.awardtitle.edit')
                          @include('admin.awardtitle.delete')
                      @endforeach
                  </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <!-- ./col -->
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h1>GENERATE FORMS</h1>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="forms" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>FORM NO.</th>
                          <th>FORM NAME</th>
                          <th>DATE AND TIME GENERATED</th>
                          <th>ACTION</th>
                      </tr>
                  </thead>
                    <tbody>
                      @foreach ($landholdings as $data)
                          <tr>
                              <td>1</td>
                              <td>CONDUCT OF PRELIMINARY OCULAR INSPECTION</td>
                              @forelse ($generateform1 as $items)
                                <td>{{ $items->generation_date}}</td>
                              @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                              @endforelse
                              <td>
                                  <a href="{{ route('form1_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm">
                                      <i class="fa fa-print"></i> GENERATE FORM
                                    </button>
                                </a>
                                <a href="{{ route('form1_upload', $data->id ) }}">
                                  <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                  </button>
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>CERTIFICATE OF PRELIMINARY PROJECTION</td>
                              @forelse ($generateform2 as $items)
                                <td>{{ $items->generation_date}}</td>
                              @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                              @endforelse
                              <td>
                                  <a href="{{ route('form2_generate', $data->id )}}">
                                      <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-print"></i> GENERATE FORM
                                      </button>
                                  </a>
                                  <a href="{{ route('form2_upload', $data->id ) }}">
                                    <button type="submit" class="btn btn-warning btn-sm">
                                      <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                    </button>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>NOTICE OF COVERAGE</td>
                            @forelse ($generateform3 as $items)
                              <td>{{ $items->generation_date}}</td>
                            @empty
                              <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form3_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm">
                                      <i class="fa fa-print"></i> GENERATE FORM
                                    </button>
                                </a>
                                <a href="{{ route('form3_upload', $data->id )}}">
                                  <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                  </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>Directive to MARO to Proceed with Coverage of Agricultural Lands with Notice of Coverage</td>
                            @forelse ($generateform10 as $items)
                              <td>{{ $items->generation_date}}</td>
                            @empty
                              <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form10_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm">
                                      <i class="fa fa-print"></i> GENERATE FORM
                                    </button>
                                </a>
                                <a href="{{ route('form10_upload', $data->id )}}">
                                  <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                  </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td>CF Documentation Memo</td>
                            @forelse ($generateform11 as $items)
                              <td>{{ $items->generation_date}}</td>
                            @empty
                              <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form11_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm">
                                      <i class="fa fa-print"></i> GENERATE FORM
                                    </button>
                                </a>
                                <a href="{{ route('form11_upload', $data->id )}}">
                                  <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                  </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>18</td>
                            <td>LO LETTER OFFER</td>
                            @forelse ($generateform18 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form18_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm">
                                      <i class="fa fa-print"></i> GENERATE FORM
                                    </button>
                                </a>
                                <a href="{{ route('form18_upload', $data->id )}}">
                                  <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                  </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>20</td>
                            <td>ACCEPTANCE LETTER FOR VOS</td>
                            @forelse ($generateform20 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form20_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm">
                                      <i class="fa fa-print"></i> GENERATE FORM
                                    </button>
                                </a>
                                <a href="{{ route('form20_upload', $data->id )}}">
                                  <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                  </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                          <td>37</td>
                          <td>APFU</td>
                          @forelse ($generateform37 as $items)
                            <td>{{ $items->generation_date}}</td>
                          @empty
                            <td><span class="text-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('form37_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i> GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form37_upload', $data->id )}}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>42</td>
                          <td>CERTIFICATION ON LOs FAILURE TO SUBMIT BIR-FILED AUDITED FINANCIAL STATEMENT</td>
                          @forelse ($generateform42 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form42_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i> GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form42_upload', $data->id )}}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>46</td>
                          <td>REVISED 2022 FIELD INVESTIGATION REPORT</td>
                          @forelse ($generateform46 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form46_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i> GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form46_upload', $data->id ) }}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>47</td>
                          <td>LAND DISTRIBUTION AND INFORMATION SCHEDULE</td>
                          @forelse ($generateform47 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form47_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i> GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form47_upload', $data->id )}}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>49</td>
                          <td>REVISED 2022 REQUEST TO VALUE LAND AND PAY LANDOWNER</td>
                          @forelse ($generateform49 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form49_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i> GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form49_upload', $data->id )}}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>51</td>
                          <td>NOTICE OF LVA</td>
                          @forelse ($generateform51 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form51_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i> GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form51_upload', $data->id )}}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>52B</td>
                          <td>POSTING ON THE ISSUANCE OF NLVA</td>
                          @forelse ($generateform52B as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form52B_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i> GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form52B_upload', $data->id )}}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>53</td>
                          <td>LAND OWNERS'S REPLY TO NOTICE OF LAND VALUATION AND AQUISITION</td>
                          @forelse ($generateform53 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form53_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i>  GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form53_upload', $data->id )}}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>54</td>
                          <td>ORDER TO DEPOSIT LANDOWNER COMPENSATION</td>
                          @forelse ($generateform54 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="text-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form54_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-print"></i>  GENERATE FORM
                                  </button>
                              </a>
                              <a href="{{ route('form54_upload', $data->id )}}">
                                <button type="submit" class="btn btn-warning btn-sm">
                                  <i class="fa fa-download"></i> UPLOAD APPROVED FORM
                                </button>
                              </a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.row -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.arb.create')
  @include('admin.lot.create')
  @include('admin.asp.create')
  @include('admin.awardtitle.create')
  @include('admin.valuation.create')
  
@endsection