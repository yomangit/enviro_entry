@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard/dustgauge/noisemeter/noise">Home</a></li>
                        <li class="breadcrumb-item active">Detail Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h6><i class="fas fa-info"></i> No Sample: <input name="total" style="width: 1.2cm;hight:1cm" type="text" disabled value="{{ $Master->CodesampleNM->nama }}"></h6>
                        <h6><i class="fas fa-map-pin"></i> Lokasi: {{ $Master->CodesampleNM->lokasi }}</h6>

                        <div class="col-12 col-md-6">

                        </div>
                      

                    </div>

                    <div class="invoice p-3 mb-3">

                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Perhitungan Leq 10 Menit
                                    <small class="float-right">{{ date('d-m-Y', strtotime( $Master->date)) }}</small>
                                </h4>
                            </div>

                        </div>




                        <div class="row">
                            <div class="col-4 table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kebisingan(dBA)</th>
                                            <th>(1/600)*5*10^(0.1Ln)</th>                                    
                                        </tr>
                                    </thead>
                                    @php
                                    $a1=0;$a2=0; 
                                     
                                    @endphp
                              
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{$Master->A1}}</td>
                                            <td> {{ round( (1/600)*5*pow(10,(0.1*$Master->A1)),6)}} </td>
                                          
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>{{$Master->A2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A2)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>{{$Master->A3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A3)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>{{$Master->A4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A4)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>{{$Master->A5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A5)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>{{$Master->A6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A6)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>{{$Master->A7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A7)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>{{$Master->A8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A8)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>{{$Master->A9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A9)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>{{$Master->A10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A10)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>{{$Master->A11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A11)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>{{$Master->A12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,(0.1*$Master->A12)),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>{{$Master->B1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>{{$Master->B2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>{{$Master->B3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>{{$Master->B4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>{{$Master->B5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>18</td>
                                            <td>{{$Master->B6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>19</td>
                                            <td>{{$Master->B7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td>{{$Master->B8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>21</td>
                                            <td>{{$Master->B9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>22</td>
                                            <td>{{$Master->B10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>23</td>
                                            <td>{{$Master->B11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>24</td>
                                            <td>{{$Master->B12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->B12),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td>{{$Master->C1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>26</td>
                                            <td>{{$Master->C2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>27</td>
                                            <td>{{$Master->C3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>28</td>
                                            <td>{{$Master->C4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>29</td>
                                            <td>{{$Master->C5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td>{{$Master->C6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>31</td>
                                            <td>{{$Master->C7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>32</td>
                                            <td>{{$Master->C8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>33</td>
                                            <td>{{$Master->C9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>34</td>
                                            <td>{{$Master->C10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>35</td>
                                            <td>{{$Master->C11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>36</td>
                                            <td>{{$Master->C12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->C12),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>37</td>
                                            <td>{{$Master->D1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>38</td>
                                            <td>{{$Master->D2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>39</td>
                                            <td>{{$Master->D3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>40</td>
                                            <td>{{$Master->D4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>41</td>
                                            <td>{{$Master->D5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>42</td>
                                            <td>{{$Master->D6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>43</td>
                                            <td>{{$Master->D7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>44</td>
                                            <td>{{$Master->D8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>45</td>
                                            <td>{{$Master->D9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>46</td>
                                            <td>{{$Master->D10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>47</td>
                                            <td>{{$Master->D11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>48</td>
                                            <td>{{$Master->D12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->D12),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>49</td>
                                            <td>{{$Master->E1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>50</td>
                                            <td>{{$Master->E2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>51</td>
                                            <td>{{$Master->E3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>52</td>
                                            <td>{{$Master->E4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>53</td>
                                            <td>{{$Master->E5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>54</td>
                                            <td>{{$Master->E6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>55</td>
                                            <td>{{$Master->E7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>56</td>
                                            <td>{{$Master->E8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>57</td>
                                            <td>{{$Master->E9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>58</td>
                                            <td>{{$Master->E10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>59</td>
                                            <td>{{$Master->E11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>60</td>
                                            <td>{{$Master->E12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->E12),6) }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4 table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kebisingan(dBA)</th>
                                            <th>(1/600)*5*10^(0.1Ln)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>61</td>
                                            <td>{{$Master->F1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>62</td>
                                            <td>{{$Master->F2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>63</td>
                                            <td>{{$Master->F3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>64</td>
                                            <td>{{$Master->F4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>65</td>
                                            <td>{{$Master->F5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>66</td>
                                            <td>{{$Master->F6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>67</td>
                                            <td>{{$Master->F7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>68</td>
                                            <td>{{$Master->F8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>69</td>
                                            <td>{{$Master->F9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>70</td>
                                            <td>{{$Master->F10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>71</td>
                                            <td>{{$Master->F11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>72</td>
                                            <td>{{$Master->F12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->F12),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>73</td>
                                            <td>{{$Master->G1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>74</td>
                                            <td>{{$Master->G2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>75</td>
                                            <td>{{$Master->G3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>76</td>
                                            <td>{{$Master->G4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>77</td>
                                            <td>{{$Master->G5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>78</td>
                                            <td>{{$Master->G6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>79</td>
                                            <td>{{$Master->G7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>80</td>
                                            <td>{{$Master->G8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>81</td>
                                            <td>{{$Master->G9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>82</td>
                                            <td>{{$Master->G10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>83</td>
                                            <td>{{$Master->G11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>84</td>
                                            <td>{{$Master->G12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->G12),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>85</td>
                                            <td>{{$Master->H1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>86</td>
                                            <td>{{$Master->H2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>87</td>
                                            <td>{{$Master->H3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>88</td>
                                            <td>{{$Master->H4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>89</td>
                                            <td>{{$Master->H5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>90</td>
                                            <td>{{$Master->H6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>91</td>
                                            <td>{{$Master->H7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>92</td>
                                            <td>{{$Master->H8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>93</td>
                                            <td>{{$Master->H9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>94</td>
                                            <td>{{$Master->H10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>95</td>
                                            <td>{{$Master->H11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>96</td>
                                            <td>{{$Master->H12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->H12),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>97</td>
                                            <td>{{$Master->I1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>98</td>
                                            <td>{{$Master->I2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>99</td>
                                            <td>{{$Master->I3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>100</td>
                                            <td>{{$Master->I4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>101</td>
                                            <td>{{$Master->I5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>102</td>
                                            <td>{{$Master->I6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>103</td>
                                            <td>{{$Master->I7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>104</td>
                                            <td>{{$Master->I8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>105</td>
                                            <td>{{$Master->I9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>106</td>
                                            <td>{{$Master->I10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>107</td>
                                            <td>{{$Master->I11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>108</td>
                                            <td>{{$Master->I12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->I12),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>109</td>
                                            <td>{{$Master->J1}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J1),6) }}</td>
                                        </tr>
                                        <tr>
                                            <td>110</td>
                                            <td>{{$Master->J2}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J2),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>{{$Master->J3}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J3),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>112</td>
                                            <td>{{$Master->J4}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J4),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>113</td>
                                            <td>{{$Master->J5}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J5),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>114</td>
                                            <td>{{$Master->J6}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J6),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>115</td>
                                            <td>{{$Master->J7}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J7),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>116</td>
                                            <td>{{$Master->J8}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J8),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>117</td>
                                            <td>{{$Master->J9}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J9),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>118</td>
                                            <td>{{$Master->J10}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J10),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>119</td>
                                            <td>{{$Master->J11}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J11),6) }}</td>

                                        </tr>
                                        <tr>
                                            <td>120</td>
                                            <td>{{$Master->J12}}</td>
                                            <td>{{round( (1/600)*5*pow(10,0.1*$Master->J12),6) }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4 table-responsive">
                                <table class="table table-striped table-head-fixed table-sm">
                                    <thead>
                                        <tr>
                                            <th>Total</th>
                                            <th>Log(Total)</th>
                                            <th>10*Log(Total)</th>
                                        </tr>
                                    </thead>
                                    @php
                                    $a1=0;$a2=0;
                                    @endphp
                                    <tbody>
                                        <tr>
                                            <td>{{ $a1=(round( (1/600)*5*pow(10,0.1*$Master->A1),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A2)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A3)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A4)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A5)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A6)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A7)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A8)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A9)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A10)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A11)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->A12)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B1)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B2)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B3)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B4)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B5)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B6)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B7)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B8)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B9)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B10)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B11)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->B12)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C1)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C2)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C3)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C4)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C5)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C6)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C7)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C8)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C9)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C10)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C11)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->C12)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D1)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D2)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D3)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D4)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D5)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D6)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D7)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D8)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D9)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D10)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D11)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->D12)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E1)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E2)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E3)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E4)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E5)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E6)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E7)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E8)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E9)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E10)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E11)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->E12)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->F1)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F2)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F3)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F4)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F5)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F6)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F7)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F8)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F9)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F10)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F11)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->F12)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G1)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G2)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G3)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G4)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G5)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G6)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G7)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G8)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G9)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G10)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G11)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->G12)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H1)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H2)),6)+round(
                                                (1/600)*5*pow(10,(0.1*$Master->H3)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H4)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H5)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H6)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H7)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H8)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H9)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H10)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H11)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->H12)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I1)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I2)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I3)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I4)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I5)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I6)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I7)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I8)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I9)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I10)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I11)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->I12)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J1)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J2)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J3)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J4)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J5)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J6)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J7)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J8)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J9)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J10)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J11)),6)+ round(
                                                (1/600)*5*pow(10,(0.1*$Master->J12)),6)) }}</td>
                                            <td>{{$a2=round((log10($a1)),9)}}</td>
                                            <td>{{10*$a2}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
@section('footer')
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
        $('#timepicker2').datetimepicker({
            format: 'LT'
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80
        , thumbnailHeight: 80
        , parallelUploads: 20
        , previewTemplate: previewTemplate
        , autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }

</script>
@endsection
<script>
    function previewImage() {
        const image = document.querySelector('#hard_copy');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection
