@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/change.css') }}">
@endsection

@section('content')
<div class="change__content">
    <div class="change__shop">
        <div class="change__shop-name">
            <button class="back-button" type="button" onclick="history.back()">＜
            </button>
            <div class="shop-name">
                {{ $shop->shop_name }}
            </div>
        </div>
        <div class="change__shop-img">
            <img class="shop-img" src="{{ $shop->shop_img }}" alt="shop">
        </div>
        <div class="change__shop-tag">
            <p class="shop-area">#{{ $shop->shop_area }}</p>
            <p class="shop-genre">#{{ $shop->shop_genre }}</p>
        </div>
        <h3 class="change__shop-text">#{{ $shop->shop_text }}</h3>
    </div>
    <div class="change__reservation">
        <div class="change__reservation--content">
            <div class="title">
                <p>予約変更</P>
            </div>
            <form class="reservation" action="{{ route('changed', ['reservation_id' => $reservation->id]) }}" method="post">
                @csrf
                <input class="input-date" type="date" id="input-date" name="reserve_date" value="{{ substr($reservation->reserve_datetime, 0, 10) }}">
                <div class="form__error">
                    @error('reserve_date')
                    {{ $message }}
                    @enderror
                </div>
                <div class="select-time">
                    <select class="input-time" id="input-time" name="reserve_time">
                        <option value="{{ substr($reservation->reserve_datetime, 11, 5) }}" disabled selected style="display:none;">{{ substr($reservation->reserve_datetime, 11, 5) }}</option>
                        <option value="10:00">10:00</option>
                        <option value="10:30">10:30</option>
                        <option value="11:00">11:00</option>
                        <option value="11:30">11:30</option>
                        <option value="12:00">12:00</option>
                        <option value="12:30">12:30</option>
                        <option value="13:00">13:00</option>
                        <option value="13:30">13:30</option>
                        <option value="14:00">14:00</option>
                        <option value="14:30">14:30</option>
                        <option value="15:00">15:00</option>
                        <option value="15:30">15:30</option>
                        <option value="16:00">16:00</option>
                        <option value="16:30">16:30</option>
                        <option value="17:00">17:00</option>
                        <option value="17:30">17:30</option>
                        <option value="18:00">18:00</option>
                        <option value="18:30">18:30</option>
                        <option value="19:00">19:00</option>
                        <option value="19:30">19:30</option>
                        <option value="20:00">20:00</option>
                        <option value="20:30">20:30</option>
                        <option value="21:00">21:00</option>
                        <option value="21:30">21:30</option>
                        <option value="22:00">22:00</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('reserve_time')
                    {{ $message }}
                    @enderror
                </div>
                <div class="select-number">
                    <select class="input-number" id="input-number" name="reserve_number">
                        <option value="{{ $reservation->reserve_number }}" disabled selected style="display:none;">{{ $reservation->reserve_number }}人</option>
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                        <option value="7">7人</option>
                        <option value="8">8人</option>
                        <option value="9">9人</option>
                        <option value="10">10人</option>
                        <option value="11">11人</option>
                        <option value="12">12人</option>
                        <option value="13">13人</option>
                        <option value="14">14人</option>
                        <option value="15">15人</option>
                        <option value="16">16人</option>
                        <option value="17">17人</option>
                        <option value="18">18人</option>
                        <option value="19">19人</option>
                        <option value="20">20人</option>
                        <option value="21">21人</option>
                        <option value="22">22人</option>
                        <option value="23">23人</option>
                        <option value="24">24人</option>
                        <option value="25">25人</option>
                        <option value="26">26人</option>
                        <option value="27">27人</option>
                        <option value="28">28人</option>
                        <option value="29">29人</option>
                        <option value="30">30人</option>
                        <option value="31">31人</option>
                        <option value="32">32人</option>
                        <option value="33">33人</option>
                        <option value="34">34人</option>
                        <option value="35">35人</option>
                        <option value="36">36人</option>
                        <option value="37">37人</option>
                        <option value="38">38人</option>
                        <option value="39">39人</option>
                        <option value="40">40人</option>
                        <option value="41">41人</option>
                        <option value="42">42人</option>
                        <option value="43">43人</option>
                        <option value="44">44人</option>
                        <option value="45">45人</option>
                        <option value="46">46人</option>
                        <option value="47">47人</option>
                        <option value="48">48人</option>
                        <option value="49">49人</option>
                        <option value="50">50人</option>
                        <option value="51">51人</option>
                        <option value="52">52人</option>
                        <option value="53">53人</option>
                        <option value="54">54人</option>
                        <option value="55">55人</option>
                        <option value="56">56人</option>
                        <option value="57">57人</option>
                        <option value="58">58人</option>
                        <option value="59">59人</option>
                        <option value="60">60人</option>
                        <option value="61">61人</option>
                        <option value="62">62人</option>
                        <option value="63">63人</option>
                        <option value="64">64人</option>
                        <option value="65">65人</option>
                        <option value="66">66人</option>
                        <option value="67">67人</option>
                        <option value="68">68人</option>
                        <option value="69">69人</option>
                        <option value="70">70人</option>
                        <option value="71">71人</option>
                        <option value="72">72人</option>
                        <option value="73">73人</option>
                        <option value="74">74人</option>
                        <option value="75">75人</option>
                        <option value="76">76人</option>
                        <option value="77">77人</option>
                        <option value="78">78人</option>
                        <option value="79">79人</option>
                        <option value="80">80人</option>
                        <option value="81">81人</option>
                        <option value="82">82人</option>
                        <option value="83">83人</option>
                        <option value="84">84人</option>
                        <option value="85">85人</option>
                        <option value="86">86人</option>
                        <option value="87">87人</option>
                        <option value="88">88人</option>
                        <option value="89">89人</option>
                        <option value="90">90人</option>
                        <option value="91">91人</option>
                        <option value="92">92人</option>
                        <option value="93">93人</option>
                        <option value="94">94人</option>
                        <option value="95">95人</option>
                        <option value="96">96人</option>
                        <option value="97">97人</option>
                        <option value="98">98人</option>
                        <option value="99">99人</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('reserve_number')
                    {{ $message }}
                    @enderror
                </div>
                <div class="reservation-output">
                    <table class="reservation-table">
                        <tr>
                            <td class="column-space">Shop</td>
                            <td class="column-space">{{ $shop->shop_name }}</td>
                        </tr>
                        <tr>
                            <td class="column-space">Date</td>
                            <td class="column-space"><span id="output-date"></span></td>
                        </tr>
                        <tr>
                            <td class="column-space">Time</td>
                            <td class="column-space"><span id="output-time"></span></td>
                        </tr>
                        <tr>
                            <td class="column-space">Number</td>
                            <td class="column-space"><span id="output-number"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="change__reservation-button">
                    <button class="change-button" type="submit">予約を変更する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection