@extends('layouts.app')

@section('content')

@include('admin.admin_navbar')
  <div class="container">
    <h2 class="title-text">Basic Information</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <div class="row">
                  @foreach ($landholdings as $data)
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      <strong>Sequence No. : <span class="info text-success">{{ $data->seqNo }}</span></strong><br>
                      <strong>Landowner : <span class="info text-success">{{ $data->firstname }} {{ $data->middlename }} {{ $data->familyname }}</span></strong><br>
                      <strong>OCT/TCT No. : <span class="info text-success">{{ $data->octNo }}</span></strong><br>
                      <strong>Survey No. : <span class="info text-success">{{ $data->surveyNo }}</span></strong><br>
                      <strong>Lot No.: <span class="info text-success">{{ $data->lotNo }}</span></strong><br>
                      <strong>Title/Survey Area : <span class="info text-success">{{ $data->surveyArea }}</span></strong><br>
                      <strong>Tax Declaration No. : <span class="info text-success">{{ $data->taxNo }}</span></strong><br>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      <strong>Coverable Area : <span class="info text-success">{{ $data->coverableArea }}</span></strong><br>
                      <strong>Carpable Area : <span class="info text-success">{{ $data->carpableArea }}</span></strong><br>
                      <strong>Non-Carpable Area : <span class="info text-success">{{ $data->noncarpableArea }}</span></strong><br>
                      <strong>Retained Area : <span class="info text-success">{{ $data->retainedArea }}</span></strong><br>
                      <strong>Distribute Area : <span class="info text-success">{{ $data->distributeArea }}</span></strong><br>
                      <strong>Land size : <span class="info text-success">{{ $data->landsize }}</span></strong><br>
                      <strong>Phase : <span class="info text-success">{{ $data->phase }}</span></strong><br>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      <strong>Major Crops Area : <span class="info text-success">{{ $data->majorCrops }}</span></strong><br>
                      <strong>Year Added : <span class="info text-success">{{ $data->yearAdded }}</span></strong><br>
                      <strong>Pipeline : <span class="info text-success">{{ $data->pipeline }}</span></strong><br>
                      <strong>Target Year : <span class="info text-success">{{ $data->targetyear }}</span></strong><br>
                      <strong>Projected Delivery : <span class="info text-success">{{ $data->projectedDelivery }}</span></strong><br>
                      <strong>Mode of Acquisition : <span class="info text-success">{{ $data->modeOfAcquisition }}</span></strong><br>
                      <strong>UPALS : <span class="info text-success">{{ $data->upals }}</span></strong><br>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
    <h2 class="title-text mt-4">ARBs</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <button class="btn btn-success btn-sm mb-5" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#addmodalarb"><i class="fa-solid fa-add"></i> Add ARB</button>
                <table id="arb" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Firstname </th>
                            <th>Lastname</th>
                            <th>Middle initial</th>
                            <th>Extension</th>
                            <th>Spouse name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Ownership Preference</th>
                            <th>Date of Oathtaking</th>
                            <th>Action</th>
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
                                <a href="" class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editmodalarb{{ $data->id }}"> <i class="fa-solid fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodalarb{{ $data->id }}"><i class="fa-solid fa-trash"></i>Delete</a>
                            </td>
                            @include('admin.arb.delete')
                            @include('admin.arb.edit')
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="title-text mt-4">Lots</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <button class="btn btn-success btn-sm mb-5" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#addmodallot"><i class="fa-solid fa-add"></i> Add Lot</button>
                <table id="lot" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ARB Name</th>
                            <th>Lot No.</th>
                            <th>Lot Type</th>
                            <th>Lot Area</th>
                            <th>Crop</th>
                            <th>Action</th>
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
                                <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmodallot{{ $data->id }}"> <i class="fa-solid fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodallot{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @include('admin.lot.edit')
                        @include('admin.lot.delete')
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="title-text mt-4">Approved Survey Plan</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <button class="btn btn-success btn-sm mb-5" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#addmodalasp"><i class="fa-solid fa-add"></i> Add Survey Plan</button>
                <table id="asp" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ASP No.</th>
                            <th>ASP Date Approved</th>
                            <th>ASP Area</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($asp as $data)
                        <tr>
                            <td>{{ $data->aspNo}}</td>
                            <td>{{ $data->aspDate}}</td>
                            <td>{{ $data->aspArea}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmodalasp{{ $data->id }}"><i class="fa-solid fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodalasp{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @include('admin.asp.edit')
                        @include('admin.asp.delete')
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="title-text mt-4">Valuations</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <button class="btn btn-success btn-sm mb-5" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#addmodalvaluation"><i class="fa-solid fa-add"></i> Add Valuation</button>
                <table id="valuation" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Lot No.</th>
                            <th>AOC No.</th>
                            <th>LBP Claim No.</th>
                            <th>Amount</th>
                            <th>Date Transmitted To LBP/AOC</th>
                            <th>Date of MOV</th>
                            <th>Date NVLA Served To LO</th>
                            <th>Date of FI</th>
                            <th>Date of CF Receipt</th>
                            <th>Transmittal Status</th>
                            <th>Action</th>
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
                            <td>
                              @if($data->transmittalStatus == 'Accepted')
                                <span class="badge bg-primary">{{ $data->transmittalStatus }}</span>
                              @endif
                              @if($data->transmittalStatus == 'Returned')
                                <span class="badge bg-danger">{{ $data->transmittalStatus }}</span>
                              @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editmodalvaluation{{ $data->id }}"><i class="fa-solid fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodalvaluation{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @include('admin.valuation.edit')
                        @include('admin.valuation.delete')
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="title-text mt-4">Award Land</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <button class="btn btn-success btn-sm mb-5" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#addmodalawardland"><i class="fa-solid fa-add"></i> Add Award Land</button>
                <table id="awardland" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Lot No.</th>
                            <th>FB/Collective Name</th>
                            <th>CLOA Serial #</th>
                            <th>Award Type</th>
                            <th>Generation Date</th>
                            <th>CLOA EPEB #</th>
                            <th>CLOA EPEB Date</th>
                            <th>Registered Date</th>
                            <th>Award Title #</th>
                            <th>Distribution Date</th>
                            <th>Action</th>
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
                                <a href="" class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editmodalawardland{{ $data->id }}"><i class="fa-solid fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodalawardland{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                            @include('admin.awardtitle.delete')
                            @include('admin.awardtitle.edit')
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="title-text mt-4">Forms</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <table id="form" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Form No.</th>
                            <th>Form Name</th>
                            <th>Date and Time Generated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($landholdings as $data)
                          <tr>
                              <td>CARPER-LAD AWARD Form No. 1</td>
                              <td>Conduct of Preliminary Ocular Inspection</td>
                              @forelse ($generateform1 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                              @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                              @endforelse
                              <td>
                                  <a href="{{ route('form1_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                              </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 1A</td>
                            <td>Transmittal of CARPER LAD Forms No. 1</td>
                            @forelse ($generateform1A as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form1A_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                            </td>
                        </tr>
                          <tr>
                              <td>CARPER-LAD AWARD Form No. 2</td>
                              <td>Certificate of Preliminary Projection</td>
                              @forelse ($generateform2 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                              @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                              @endforelse
                              <td>
                                  <a href="{{ route('form2_generate', $data->id )}}">
                                      <button type="submit" class="btn btn-success btn-sm mb-1">
                                        <i class="fa fa-print"></i> Generate
                                      </button>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 3</td>
                            <td>Notice of Coverage</td>
                            @forelse ($generateform3 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form3_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 4</td>
                            <td>LO Letter Reply to NOC</td>
                            @forelse ($generateform4 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form4_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 5</td>
                            <td>LO Manifestation to Apply for Retention</td>
                            @forelse ($generateform5 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form5_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 6</td>
                            <td>Sketch Map of the Selected Retained Area</td>
                            @forelse ($generateform6 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form6_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 7</td>
                            <td>LO Nomination Children as preferred beneficiaries</td>
                            @forelse ($generateform7 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form7_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 8</td>
                            <td>Landowner's Certification on Duly Attested List of Tenants, Lessees, and-or Regular Farmworkers</td>
                            @forelse ($generateform8 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form8_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 9</td>
                            <td>Manifestation to Apply Petition for Exemption Exclusion Clearance or file Petition Protest from CARP Cov</td>
                            @forelse ($generateform9 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form9_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 10</td>
                            <td>Directive to MARO to Proceed with Coverage of Agricultural Lands with Notice of Coverage</td>
                            @forelse ($generateform10 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form10_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 11</td>
                            <td>CF Documentation Memo</td>
                            @forelse ($generateform11 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form11_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 12A</td>
                            <td>Request for Personal Service of the NOC or VOS Acceptance Letter to the LO residing in MM</td>
                            @forelse ($generateform12A as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form12A_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 13A</td>
                            <td>Request for Personal Service of the NOC or VOS Acceptance Letter to the LO residing in MM</td>
                            @forelse ($generateform13A as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form13A_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 14</td>
                            <td>Report on Failure to Serve NOC or VOS Acceptance Letter to the LO and Request for NOC Publication</td>
                            @forelse ($generateform14 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form14_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 15</td>
                            <td>Request for Publication by BLAD</td>
                            @forelse ($generateform15 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form15_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 16</td>
                            <td>Publication of NOC or VOS Acceptance Letter</td>
                            @forelse ($generateform16 as $items)
                              <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form16_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 17</td>
                            <td>Certificate of Posting Compliance</td>
                            @forelse ($generateform17 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form17_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 18</td>
                            <td>LO Letter Offer</td>
                            @forelse ($generateform18 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form18_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 18A</td>
                            <td>Checklist of Required Docs</td>
                            @forelse ($generateform18A as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form18A_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 19</td>
                            <td>Landowner's Information Sheet</td>
                            @forelse ($generateform19 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form19_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 20</td>
                            <td>Acceptance Letter for VOS</td>
                            @forelse ($generateform20 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form20_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 21</td>
                            <td>Rejection Letter for VOS</td>
                            @forelse ($generateform21 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form21_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 22</td>
                            <td>OCI Report</td>
                            @forelse ($generateform22 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form22_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 23</td>
                            <td>Notice to LO on Selected Retained Area</td>
                            @forelse ($generateform23 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form23_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 24</td>
                            <td>Certificate of Retention</td>
                            @forelse ($generateform24 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form24_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 25</td>
                            <td>Request for Cert.of Retention</td>
                            @forelse ($generateform25 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form25_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 26</td>
                            <td>List of LH with Issued CR</td>
                            @forelse ($generateform26 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form26_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 27</td>
                            <td>RSS</td>
                            @forelse ($generateform27 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form27_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 28</td>
                            <td>Preliminary List of Potential ARBs</td>
                            @forelse ($generateform28 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form28_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 29</td>
                            <td>Request-Petition to be included as PARBs</td>
                            @forelse ($generateform29 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form29_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 30</td>
                            <td>ARB Application with Revision - 11-23-2011</td>
                            @forelse ($generateform30 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form30_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 31</td>
                            <td>BARC Certified Master List of Qualified ARBs approved by the PARO</td>
                            @forelse ($generateform31 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form31_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 32</td>
                            <td>Transmittal Letter to BARC for certification of Master List</td>
                            @forelse ($generateform32 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form32_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 33</td>
                            <td>Notice on the BARC Certified Master List</td>
                            @forelse ($generateform33 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form33_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 34</td>
                            <td>Notice of Disqualification</td>
                            @forelse ($generateform34 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form34_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 35</td>
                            <td>Amended Master List of Qualified ARBs</td>
                            @forelse ($generateform35 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form35_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>CARPER-LAD AWARD Form No. 36</td>
                            <td>Notice</td>
                            @forelse ($generateform36 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('form36_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 37</td>
                          <td>APFU</td>
                          @forelse ($generateform37 as $items)
                            <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                          @empty
                            <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('form37_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 37A</td>
                          <td>Agreement of Equal Award</td>
                          @forelse ($generateform37A as $items)
                            <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                          @empty
                            <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('form37A_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 38</td>
                          <td>Notice to ARB Schedule of APFU Signing</td>
                          @forelse ($generateform38 as $items)
                            <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                          @empty
                            <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('form38_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 39</td>
                          <td>Notice to Absentee ARB om Waiver of ARB Rights for failure to sign</td>
                          @forelse ($generateform39 as $items)
                            <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                          @empty
                            <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('form39_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 40</td>
                          <td>Letter to ARB Attendees who refused to sign APFU</td>
                          @forelse ($generateform40 as $items)
                            <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                          @empty
                            <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('form40_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 41</td>
                          <td>Report on the ARBs Failure or refusal to sign APFU</td>
                          @forelse ($generateform41 as $items)
                            <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                          @empty
                            <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('form41_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 42</td>
                          <td>Certification on LOs Failure to submit BIR-Filed Audited Financial Statement</td>
                          @forelse ($generateform42 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form42_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 43</td>
                          <td>Claim Folder Transmittal Memorandum</td>
                          @forelse ($generateform43 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form43_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 44</td>
                          <td>Request on the conduct of Field Investigation</td>
                          @forelse ($generateform44 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form44_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 45</td>
                          <td>Notice to conduct FI</td>
                          @forelse ($generateform45 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form45_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 45-A</td>
                          <td>Notice to Conduct Joint Field Investigation</td>
                          @forelse ($generateform45A as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form45A_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 46</td>
                          <td>Revised 2022 Field Investigation Report</td>
                          @forelse ($generateform46 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form46_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 47</td>
                          <td>Land Distribution and Information Schedule</td>
                          @forelse ($generateform47 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form47_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 48</td>
                          <td>Revised 2022 Checklist of Documentary Requirement in the Claim Folder for Transmittal to LBP</td>
                          @forelse ($generateform48 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form48_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 49</td>
                          <td>Revised 2022 Request to Value Land and Pay Landowner</td>
                          @forelse ($generateform49 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form49_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 50</td>
                          <td>Memo of Valuation</td>
                          @forelse ($generateform50 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form50_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 51</td>
                          <td>Notice of LVA</td>
                          @forelse ($generateform51 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form51_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 52A</td>
                          <td>Publication on the Issuance of NLVA</td>
                          @forelse ($generateform52A as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form52A_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 52B</td>
                          <td>Posting on the Issuance of NLVA</td>
                          @forelse ($generateform52B as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form52B_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 53</td>
                          <td>Land Owner's Reply to Notice of Land Valuation and Aquisition</td>
                          @forelse ($generateform53 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form53_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 54</td>
                          <td>Order to Deposit Landowner Compensation</td>
                          @forelse ($generateform54 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form54_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 55</td>
                          <td>Certificate of Deposit</td>
                          @forelse ($generateform55 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form55_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 57</td>
                          <td>Request Issuance Transfer Certificate (TCT) in the Name of the Republic of the Philippines (RP)</td>
                          @forelse ($generateform57 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form57_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 58</td>
                          <td>Transmittal to LBP of Copy of RP Title</td>
                          @forelse ($generateform58 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form58_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 59</td>
                          <td>Advice to DARAB Adjudicator to Conduct Administrative Proceedings</td>
                          @forelse ($generateform59 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form59_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 60</td>
                          <td>PARO Directive to take Actual & Physical Possession</td>
                          @forelse ($generateform60 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form60_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 61</td>
                          <td>Letter to Qualified ARB</td>
                          @forelse ($generateform61 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form61_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 62</td>
                          <td>LDF Transmittal to PARO</td>
                          @forelse ($generateform62 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form62_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 63</td>
                          <td>Transmittal to PARO re Signed and Sealed CLOAs</td>
                          @forelse ($generateform63 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form63_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 64</td>
                          <td>Revised 2022 Transmittal Memorandum to ROD of CLOAs for Registration</td>
                          @forelse ($generateform64 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form64_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 65</td>
                          <td>Transmittal Memorandum of Registered CLOA Titles from ROD to LBP</td>
                          @forelse ($generateform65 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form65_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 66</td>
                          <td>Monthly Report CLOA</td>
                          @forelse ($generateform66 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form66_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 67</td>
                          <td>Report on Failure to Take Possession</td>
                          @forelse ($generateform67 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form67_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 68</td>
                          <td>Writ of Installation</td>
                          @forelse ($generateform68 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form68_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 68A</td>
                          <td>Revised 2022 Notice to Qualified Agrarian Reform beneficiary/ies for Physical Installation</td>
                          @forelse ($generateform68A as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form68A_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 68B</td>
                          <td>Physical Installation of ARBs in the Landholding</td>
                          @forelse ($generateform68B as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form68B_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>CARPER-LAD AWARD Form No. 69</td>
                          <td>Letter to PNP</td>
                          @forelse ($generateform69 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('form69_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>LAD-Award to Child Form No. 1</td>
                          <td>List of Potential Children-Awardee under CARP</td>
                          @forelse($generateawardform1 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('awardform1_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>LAD-Award to Child Form No. 2</td>
                          <td>Letter to Potential Children-Awardees Regarding the Award <br> of Agricultural Lands owned by Parent-Landowner</td>
                          @forelse($generateawardform2 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('awardform2_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>LAD-Award to Child Form No. 3</td>
                          <td>Certificate of Posting Compliance</td>
                          @forelse($generateawardform3 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('awardform3_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>LAD-Award to Child Form No. 4</td>
                          <td>Field Investigation Report</td>
                          @forelse($generateawardform4 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('awardform4_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>LAD-Award to Child Form No. 5</td>
                          <td>Recommendation for Approval/Disapproval of Award to Children <br> of Agricultural Lands owned by Parent-Landowner</td>
                          @forelse($generateawardform5 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('awardform5_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>LAD-Award to Child Form No. 6</td>
                          <td>Order of Award to Qualified Children of Parent-Landowner</td>
                          @forelse($generateawardform6 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('awardform6_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>LAD-Award to Child Form No. 7</td>
                          <td>Order of Denial to Disqualified Children of Parent-Landowner</td>
                          @forelse($generateawardform7 as $items)
                                <td>{{ \Carbon\Carbon::parse($items->generation_date)->format('F j, Y - H:i:s') }}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('awardform7_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="title-text mt-4">Approved Forms</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <button class="btn btn-success btn-sm mb-5" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#addmodalapproved"><i class="fa-solid fa-add"></i> Upload Form</button>
                <table id="approved" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Form No.</th>
                            <th>Form Name</th>
                            <th>Date Upload</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($approvedform as $data)
                        <tr>
                            <td>{{ $data->formNo }}</td>
                            <td>{{ $data->uploadfile }}</td>
                            <td>{{ $data->date_upload}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmodalapproved{{ $data->id }}"><i class="fa-solid fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodalapproved{{ $data->id }}"><i class="fa-solid fa-trash"></i> Delete</a>
                                <a href="{{ route('approvedform_download', $data->id )}}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-upload"></i> Download</a>
                            </td>
                            @include('admin.approvedform.edit')
                            @include('admin.approvedform.delete')
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  @include('admin.arb.create')
  @include('admin.lot.create')
  @include('admin.asp.create')
  @include('admin.awardtitle.create')
  @include('admin.valuation.create')
  @include('admin.approvedform.create')
@endsection