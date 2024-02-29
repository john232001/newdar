@extends('layouts.app')

@section('content')

@include('staff.staff_navbar')
  <div class="container">
    <h2 class="title-text">Basic Information</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
                <table class="table" style="width:100%">
                      @foreach($landholdings as $data)
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                            <td>Landholding ID : <span class="text-success">{{ $data->lhid }}</span></td>
                            <td>Coverable Area : <span class="text-success"> {{ $data->coverableArea }}</td>
                            <td>Major Crops Area : <span class="text-success"> {{ $data->majorCrops }}</span></td>
                        </tr>
                        <tr>
                            <td>Landowner : <span class="text-success"> {{ $data->firstname }} {{ $data->middlename }} {{ $data->familyname }}</span></td>
                            <td>Carpable Area : <span class="text-success"> {{ $data->carpableArea }}</span></td>
                            <td>Year Added : <span class="text-success"> {{ $data->yearAdded }}</span></td>
                        </tr>
                        <tr>
                            <td>OCT/TCT No. : <span class="text-success"> {{ $data->octNo }}</span></td>
                            <td>Non-Carpable Area : <span class="text-success"> {{ $data->noncarpableArea }}</span></td>
                            <td>Pipeline : <span class="text-success"> {{ $data->pipeline }}</span></td>
                        </tr>
                        <tr>
                            <td>Survey No. : <span class="text-success"> {{ $data->surveyNo }}</span></td>
                            <td>Retained Area : <span class="text-success"> {{ $data->retainedArea }}</span></td>
                            <td>Target Year : <span class="text-success"> {{ $data->targetyear }}</span></td>
                        </tr>
                        <tr>
                            <td>Lot No. : <span class="text-success"> {{ $data->lotNo }}</span></td>
                            <td>Distribute Area : <span class="text-success"> {{ $data->distributeArea }}</span></td>
                            <td>Projected Delivery : </strong><span class="text-success"> {{ $data->projectedDelivery }}</span></td>
                        </tr>
                        <tr>
                            <td>Title/Survey Area : <span class="text-success"> {{ $data->surveyArea }}</span></td>
                            <td>Land size: <span class="text-success"> {{ $data->landsize }}</span></td>
                            <td>Mode of Acquisition : <span class="text-success"> {{ $data->modeOfAcquisition }}</td>
                        </tr>
                        <tr>
                            <td>Tax Declaration No. : <span class="text-success"> {{ $data->taxNo }}</span></td>
                            <td>Phase : <span class="text-success"> {{ $data->phase }}</span></td>
                            <td>UPALS : <span class="text-success"> {{ $data->upals }}</span></td>
                        </tr>
                      @endforeach
                </table>
            </div>
        </div>
    </div>
    <h2 class="title-text mt-4">ARBs</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card p-5 rounded-4">
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
                <table id="lot" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ARB Name</th>
                            <th>Lot No.</th>
                            <th>Lot Type</th>
                            <th>Lot Area</th>
                            <th>Crop</th>
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
                        </tr>
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
                <table id="asp" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ASP No.</th>
                            <th>ASP Date Approved</th>
                            <th>ASP Area</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($asp as $data)
                        <tr>
                            <td>{{ $data->aspNo}}</td>
                            <td>{{ $data->aspDate}}</td>
                            <td>{{ $data->aspArea}}</td>
                        </tr>
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
                        </tr>
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
                              <td>1</td>
                              <td>Conduct of Preliminary Ocular Inspection</td>
                              @forelse ($generateform1 as $items)
                                <td>{{ $items->generation_date}}</td>
                              @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                              @endforelse
                              <td>
                                  <a href="{{ route('staff_form1_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>Certificate of Preliminary Projection</td>
                              @forelse ($generateform2 as $items)
                                <td>{{ $items->generation_date}}</td>
                              @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                              @endforelse
                              <td>
                                  <a href="{{ route('staff_form2_generate', $data->id )}}">
                                      <button type="submit" class="btn btn-success btn-sm mb-1">
                                        <i class="fa fa-print"></i> Generate
                                      </button>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Notice of Coverage</td>
                            @forelse ($generateform3 as $items)
                              <td>{{ $items->generation_date}}</td>
                            @empty
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('staff_form3_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
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
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('staff_form10_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
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
                              <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('staff_form11_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
                                    </button>
                                </a>
                            </td>
                          </tr>
                          <tr>
                            <td>17</td>
                            <td>Certificate of Posting Compliance</td>
                            @forelse ($generateform17 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                            <td>
                                <a href="{{ route('staff_form17_generate', $data->id )}}">
                                    <button type="submit" class="btn btn-success btn-sm mb-1">
                                      <i class="fa fa-print"></i> Generate
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
                            <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                          @endforelse
                          <td>
                              <a href="{{ route('staff_form37_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>42</td>
                          <td>Certification on LOs Failure to submit BIR-Filed Audited Financial Statement</td>
                          @forelse ($generateform42 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form42_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>45-A</td>
                          <td>Notice to Conduct Joint Field Investigation</td>
                          @forelse ($generateform45A as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form45A_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>46</td>
                          <td>Revised 2022 Field Investigation Report</td>
                          @forelse ($generateform46 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form46_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>47</td>
                          <td>Land Distribution and Information Schedule</td>
                          @forelse ($generateform47 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form47_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>49</td>
                          <td>Revised 2022 Request to Value Land and Pay Landowner</td>
                          @forelse ($generateform49 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form49_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>51</td>
                          <td>Notice of LVA</td>
                          @forelse ($generateform51 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form51_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>52A</td>
                          <td>Publication on the Issuance of NLVA</td>
                          @forelse ($generateform52A as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form52A_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>52B</td>
                          <td>Posting on the Issuance of NLVA</td>
                          @forelse ($generateform52B as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form52B_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i> Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>53</td>
                          <td>Land Owner's Reply to Notice of Land Valuation and Aquisition</td>
                          @forelse ($generateform53 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form53_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>54</td>
                          <td>Order to Deposit Landowner Compensation</td>
                          @forelse ($generateform54 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form54_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>57</td>
                          <td>Request Issuance Transfer Certificate (TCT) in the Name of the Republic of the Philippines (RP)</td>
                          @forelse ($generateform57 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form57_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>58</td>
                          <td>Transmittal to LBP of Copy of RP Title</td>
                          @forelse ($generateform58 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form58_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>59</td>
                          <td>Advice to DARAB Adjudicator to Conduct Administrative Proceedings</td>
                          @forelse ($generateform59 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form59_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>60</td>
                          <td>PARO Directive to take Actual & Physical Possession</td>
                          @forelse ($generateform60 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form60_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>61</td>
                          <td>Letter to Qualified ARB</td>
                          @forelse ($generateform61 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form61_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>62</td>
                          <td>LDF Transmittal to PARO</td>
                          @forelse ($generateform62 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form62_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>63</td>
                          <td>Transmittal to PARO re Signed and Sealed CLOAs</td>
                          @forelse ($generateform63 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form63_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>64</td>
                          <td>Revised 2022 Transmittal Memorandum to ROD of CLOAs for Registration</td>
                          @forelse ($generateform64 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form64_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>65</td>
                          <td>Transmittal Memorandum of Registered CLOA Titles from ROD to LBP</td>
                          @forelse ($generateform65 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form65_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>66</td>
                          <td>Monthly Report CLOA</td>
                          @forelse ($generateform66 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form66_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>67</td>
                          <td>Report on Failure to Take Possession</td>
                          @forelse ($generateform67 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form67_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>68</td>
                          <td>Writ of Installation</td>
                          @forelse ($generateform68 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form68_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>68A</td>
                          <td>Revised 2022 Notice to Qualified Agrarian Reform beneficiary/ies for Physical Installation</td>
                          @forelse ($generateform68A as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form68A_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>68B</td>
                          <td>Physical Installation of ARBs in the Landholding</td>
                          @forelse ($generateform68B as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form68B_generate', $data->id )}}">
                                  <button type="submit" class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-print"></i>  Generate
                                  </button>
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td>69</td>
                          <td>Letter to PNP</td>
                          @forelse ($generateform69 as $items)
                                <td>{{ $items->generation_date}}</td>
                            @empty
                                <td><span class="badge rounded-pill bg-danger">No Generate Date</span></td>
                            @endforelse
                          <td>
                              <a href="{{ route('staff_form69_generate', $data->id )}}">
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
                                <a href="{{ route('staff_approvedform_download', $data->id )}}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-upload"></i> Download</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection