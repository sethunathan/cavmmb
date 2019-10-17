<!DOCTYPE html>
<html lang="ta" dir="ltr" >
<head>
        <meta charset="UTF-16">
        <title><?php if(isset($title)){echo $title; ?> | <?php  } echo $this->config->item('site_name') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo asset_url('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo asset_url('css/site.css') ?>" rel="stylesheet">
        <link href="<?php echo asset_url('css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
		        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		
		
	
        <?php echo $headers ?>
		
    </head>
    <body>
	
	<form action="<?php echo base_url();?>user/updateuser/<?php echo $cuser->userid ?>"  method="post">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
					
                    
                    
                    <div class="nav-collapse">
                        <ul class="nav">
						
                            <?php echo anchor('#', $cuser->name, 'class="brand"') ?>
							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li><?php echo anchor('/editprofile', 'Reg/Edit') ?></li>	
                            <li><?php echo anchor('/account', 'View') ?></li>	                             
                             <li><?php echo anchor('login/logout', 'Logout') ?></li>
                             <li><?php echo anchor('/home', 'All') ?></li>		
                             <li><?php echo anchor('/indexnew', 'Expected') ?></li>							 
                             <li><?php echo anchor('/mylikedProfile', 'எனக்குப் பிடித்த வரன்கள்') ?></li>
							 <li><?php echo anchor('/melikedProfile', 'என்னை பிடித்த வரன்கள்') ?></li>
							 <li><?php echo anchor('/bothlikedProfile', 'இருவருக்கும் பிடித்த வரன்கள்') ?></li>
							 
							
							<form action="<?php echo base_url();?>account" method="post" enctype="multipart/form-data">
					    	  <strong>உங்கள் எதிர்பார்ப்புகளை இங்கே மாற்றி கொள்ளவும்:</strong>
	
		<br>
	 <label>படிப்பு</label>
     <input type="text" name="cust[reqedu]"  type="text" value="<?php echo $cuser->reqedu; ?>" />
	  
    <label>வேலை (அ) தொழில் :</label>
	  <select name="cust[reqwork]"> 
	    <option value="வேலை" <?php echo ($cuser->reqwork=="வேலை")?'selected':'' ?> >வேலை</option>
	    <option value="தொழில்" <?php echo ($cuser->reqwork=="தொழில்")?'selected':'' ?> >தொழில்</option>
        <option value="வேலை (அ) தொழில்" <?php echo ($cuser->reqwork=="வேலை (அ) தொழில்")?'selected':'' ?> >வேலை (அ) தொழில்</option>
	    <option value="இல்லத்தரசி" <?php echo ($cuser->reqwork=="இல்லத்தரசி")?'selected':'' ?> >இல்லத்தரசி</option>
	    <option value="விருப்பம்" <?php echo ($cuser->reqwork=="விருப்பம்")?'selected':'' ?> >விருப்பம்</option>
	</select>
    
	<label>மாத வருமானம் :</label>
	     <input name="cust[reqincome]" value="<?php echo $cuser->reqincome; ?>"  type="text" />
	  
	 


	
	 <label>வயது:</label>
     <select name="cust[reqage]" style="width: 50px;">  
    <option value="<?php echo $cuser->reqage; ?>" selected="selected"><?php echo $cuser->reqage; ?></option>   
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">55</option>
    <option value="56">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
     </select> 
	 <select name="cust[reqage1]" style="width: 50px;">  
    <option value="<?php echo $cuser->reqage1; ?>" selected="selected"><?php echo $cuser->reqage1; ?></option>   
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">55</option>
    <option value="56">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
     </select> 
	 
	 <label>உயரம்	 :</label>	
    <select name="cust[reqheight]" style="width: 60px;"> 
    <option value="<?php echo $cuser->reqheight; ?>" selected="selected"><?php echo $cuser->reqheight; ?></option> 
    <option value="100">100</option>
    <option value="101">101</option>
    <option value="102">102</option>
    <option value="103">103</option>
    <option value="104">104</option>
    <option value="105">105</option>
    <option value="106">106</option>
    <option value="107">107</option>
    <option value="108">108</option>
    <option value="109">109</option>
    <option value="110">110</option>
    <option value="111">111</option>
    <option value="112">112</option>
    <option value="113">113</option>
    <option value="114">114</option>
    <option value="115">115</option>
    <option value="116">116</option>
    <option value="117">117</option>
    <option value="118">118</option>
    <option value="119">119</option>
    <option value="120">120</option>
    <option value="121">121</option>
    <option value="122">122</option>
    <option value="123">123</option>
    <option value="124">124</option>
    <option value="125">125</option>
    <option value="126">126</option>
    <option value="127">127</option>
    <option value="128">128</option>
    <option value="129">129</option>
    <option value="130">130</option>
    <option value="131">131</option>
    <option value="132">132</option>
    <option value="133">133</option>
    <option value="134">134</option>
    <option value="135">135</option>
    <option value="136">136</option>
    <option value="137">137</option>
    <option value="138">138</option>
    <option value="139">139</option>
    <option value="140">140</option>
    <option value="141">141</option>
    <option value="142">142</option>
    <option value="143">143</option>
    <option value="144">144</option>
    <option value="145">145</option>
    <option value="146">146</option>
    <option value="147">147</option>
    <option value="148">148</option>
    <option value="149">149</option>
    <option value="150">150</option>
    <option value="151">151</option>
    <option value="152">152</option>
    <option value="153">153</option>
    <option value="154">154</option>
    <option value="155">155</option>
    <option value="156">156</option>
    <option value="157">157</option>
    <option value="158">158</option>
    <option value="159">159</option>
    <option value="160">160</option>
    <option value="161">161</option>
    <option value="162">162</option>
    <option value="163">163</option>
    <option value="164">164</option>
    <option value="165">165</option>
    <option value="166">166</option>
    <option value="167">167</option>
    <option value="168">168</option>
    <option value="169">169</option>
    <option value="170">170</option>
    <option value="171">171</option>
    <option value="172">172</option>
    <option value="173">173</option>
    <option value="174">174</option>
    <option value="175">175</option>
    <option value="176">176</option>
    <option value="177">177</option>
    <option value="178">178</option>
    <option value="179">179</option>
    <option value="180">180</option>
    <option value="181">181</option>
    <option value="182">182</option>
    <option value="183">183</option>
    <option value="184">184</option>
    <option value="185">185</option>
    <option value="186">186</option>
    <option value="187">187</option>
    <option value="188">188</option>
    <option value="189">189</option>
    <option value="190">190</option>
    <option value="191">191</option>
    <option value="192">192</option>
    <option value="193">193</option>
    <option value="194">194</option>
    <option value="195">195</option>
    <option value="196">196</option>
    <option value="197">197</option>
    <option value="198">198</option>
    <option value="199">199</option>
     </select>  
    <select name="cust[reqheight1]" style="width: 60px;"> 
    <option value="<?php echo $cuser->reqheight1; ?>" selected="selected"><?php echo $cuser->reqheight1; ?></option> 
        <option value="100">100</option>
    <option value="101">101</option>
    <option value="102">102</option>
    <option value="103">103</option>
    <option value="104">104</option>
    <option value="105">105</option>
    <option value="106">106</option>
    <option value="107">107</option>
    <option value="108">108</option>
    <option value="109">109</option>
    <option value="110">110</option>
    <option value="111">111</option>
    <option value="112">112</option>
    <option value="113">113</option>
    <option value="114">114</option>
    <option value="115">115</option>
    <option value="116">116</option>
    <option value="117">117</option>
    <option value="118">118</option>
    <option value="119">119</option>
    <option value="120">120</option>
    <option value="121">121</option>
    <option value="122">122</option>
    <option value="123">123</option>
    <option value="124">124</option>
    <option value="125">125</option>
    <option value="126">126</option>
    <option value="127">127</option>
    <option value="128">128</option>
    <option value="129">129</option>
    <option value="130">130</option>
    <option value="131">131</option>
    <option value="132">132</option>
    <option value="133">133</option>
    <option value="134">134</option>
    <option value="135">135</option>
    <option value="136">136</option>
    <option value="137">137</option>
    <option value="138">138</option>
    <option value="139">139</option>
    <option value="140">140</option>
    <option value="141">141</option>
    <option value="142">142</option>
    <option value="143">143</option>
    <option value="144">144</option>
    <option value="145">145</option>
    <option value="146">146</option>
    <option value="147">147</option>
    <option value="148">148</option>
    <option value="149">149</option>
    <option value="150">150</option>
    <option value="151">151</option>
    <option value="152">152</option>
    <option value="153">153</option>
    <option value="154">154</option>
    <option value="155">155</option>
    <option value="156">156</option>
    <option value="157">157</option>
    <option value="158">158</option>
    <option value="159">159</option>
    <option value="160">160</option>
    <option value="161">161</option>
    <option value="162">162</option>
    <option value="163">163</option>
    <option value="164">164</option>
    <option value="165">165</option>
    <option value="166">166</option>
    <option value="167">167</option>
    <option value="168">168</option>
    <option value="169">169</option>
    <option value="170">170</option>
    <option value="171">171</option>
    <option value="172">172</option>
    <option value="173">173</option>
    <option value="174">174</option>
    <option value="175">175</option>
    <option value="176">176</option>
    <option value="177">177</option>
    <option value="178">178</option>
    <option value="179">179</option>
    <option value="180">180</option>
    <option value="181">181</option>
    <option value="182">182</option>
    <option value="183">183</option>
    <option value="184">184</option>
    <option value="185">185</option>
    <option value="186">186</option>
    <option value="187">187</option>
    <option value="188">188</option>
    <option value="189">189</option>
    <option value="190">190</option>
    <option value="191">191</option>
    <option value="192">192</option>
    <option value="193">193</option>
    <option value="194">194</option>
    <option value="195">195</option>
    <option value="196">196</option>
    <option value="197">197</option>
    <option value="198">198</option>
    <option value="199">199</option>
     </select>  
		 
	<label>எடை	 :</label>
	<select name="cust[reqweight]" style="width: 60px;"> 
    <option value="<?php echo $cuser->reqweight; ?>" selected="selected"><?php echo $cuser->reqweight; ?></option> 
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">55</option>
    <option value="56">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
    <option value="61">61</option>
    <option value="62">62</option>
    <option value="63">63</option>
    <option value="64">64</option>
    <option value="65">65</option>
    <option value="66">66</option>
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="77">77</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="81">81</option>
    <option value="82">82</option>
    <option value="83">83</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="87">87</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="92">92</option>
    <option value="93">93</option>
    <option value="94">94</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="99">99</option>
    <option value="100">100</option>
    <option value="101">101</option>
    <option value="102">102</option>
    <option value="103">103</option>
    <option value="104">104</option>
    <option value="105">105</option>
    <option value="106">106</option>
    <option value="107">107</option>
    <option value="108">108</option>
    <option value="109">109</option>
    <option value="110">110</option>
    <option value="111">111</option>
    <option value="112">112</option>
    <option value="113">113</option>
    <option value="114">114</option>
    <option value="115">115</option>
    <option value="116">116</option>
    <option value="117">117</option>
    <option value="118">118</option>
    <option value="119">119</option>
    <option value="120">120</option>
    <option value="121">121</option>
    <option value="122">122</option>
    <option value="123">123</option>
    <option value="124">124</option>
    <option value="125">125</option>
    <option value="126">126</option>
    <option value="127">127</option>
    <option value="128">128</option>
    <option value="129">129</option>
    <option value="130">130</option>
                </select>

    <select name="cust[reqweight1]" style="width: 60px;"> 
    <option value="<?php echo $cuser->reqweight1; ?>" selected="selected"><?php echo $cuser->reqweight1; ?></option> 
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">55</option>
    <option value="56">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
    <option value="61">61</option>
    <option value="62">62</option>
    <option value="63">63</option>
    <option value="64">64</option>
    <option value="65">65</option>
    <option value="66">66</option>
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="77">77</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="81">81</option>
    <option value="82">82</option>
    <option value="83">83</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="87">87</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="92">92</option>
    <option value="93">93</option>
    <option value="94">94</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="99">99</option>
    <option value="100">100</option>
    <option value="101">101</option>
    <option value="102">102</option>
    <option value="103">103</option>
    <option value="104">104</option>
    <option value="105">105</option>
    <option value="106">106</option>
    <option value="107">107</option>
    <option value="108">108</option>
    <option value="109">109</option>
    <option value="110">110</option>
    <option value="111">111</option>
    <option value="112">112</option>
    <option value="113">113</option>
    <option value="114">114</option>
    <option value="115">115</option>
    <option value="116">116</option>
    <option value="117">117</option>
    <option value="118">118</option>
    <option value="119">119</option>
    <option value="120">120</option>
    <option value="121">121</option>
    <option value="122">122</option>
    <option value="123">123</option>
    <option value="124">124</option>
    <option value="125">125</option>
    <option value="126">126</option>
    <option value="127">127</option>
    <option value="128">128</option>
    <option value="129">129</option>
    <option value="130">130</option>
                </select>
				
	<br>
	<label>வரன் பார்க்கும்	தூரம் :</label>
	     <input name="cust[reqdistance]" value="<?php echo $cuser->reqdistance; ?>"  type="text" />
	 <label>ஜாதகம்	:</label>
	 
	<select name="cust[reqastro]" >	    
	    <option value="தேவை" <?php echo ($cuser->reqastro=="தேவை")?'selected':'' ?> >தேவை</option>
	    <option value="தேவையில்லை" <?php echo ($cuser->reqastro=="தேவையில்லை")?'selected':'' ?> >தேவையில்லை</option>
	</select>	
	
<?php /*	
<a href="javascript:hideshow(document.getElementById('adiv'))">வசதி:</a>

<script type="text/javascript">
function hideshow(which){
if (!document.getElementById)
return
if (which.style.display=="none")
which.style.display="block"
else
which.style.display="none"
}
</script>

<div id="adiv" style="display: none">
		<?php foreach ($statuz->result_array() as $row)
		  { 
		   $statusz=$row['status_id'];		  
		  ?> 
		   <input type="radio" name=status[<?php print $statusz;?>] value=<?php $row['remarks'];?> />		  
           <?php   echo $row['remarks']; echo "<br>";echo "<br>";} ?>
</div>
	<br>
		*/?>
    
		
	<?php //print_r($_POST['service']);$services = implode(",", $_POST['service']);?>
	<?php 
	/*
	$reqfamilystatus=json_decode($cuser->reqfamilystatus); ?>
	<label class="radio"><input type="checkbox" name="service[]" 
	     <?php if (in_array("கீழ்தட்டு",$reqfamilystatus)) {echo 'checked="checked" ';}?> value="கீழ்தட்டு" />கீழ்தட்டு</label>
	
    <label class="radio"><input type="checkbox" name="service[]" 
	    <?php if (in_array("நுத்தரம்",$reqfamilystatus)) {echo 'checked="checked" ';}?>  value="நடுத்தரம்" />நடுத்தரம்
	</label>
	
    <label class="radio"><input type="checkbox" name="service[]"
	   <?php if (in_array("மேல்தட்டு",$reqfamilystatus)) {echo 'checked="checked" ';}?> value="மேல்தட்டு" />மேல்தட்டு
	</label>
	
    <label class="radio"><input type="checkbox" name="service[]" 
	  <?php if (in_array("வசதி படைத்தோர்",$reqfamilystatus)) {echo 'checked="checked" ';}?> value="வசதி படைத்தோர்" />வசதி படைத்தோர்
	</label>
	
    <label class="radio"><input type="checkbox" name="service[]" 
	   <?php if (in_array("மிக வசதி படைத்தோர்",$reqfamilystatus)) {echo 'checked="checked" ';}?>value="மிக வசதி படைத்தோர்" />மிக வசதி படைத்தோர்
	</label>
	*/?>
	<?php 
	foreach($client->result() as $cuser){};
	//$user=json_decode($cuser->user);
	//$rasi=json_decode($cuser->rasi);
	//$amsam=json_decode($cuser->amsam);
	
	$status=json_decode($cuser->reqfamilystatus);	
	?>
	
	<?php //print_r($status);?>
	<label>வசதி:</label>
	<select name="reqfamilystatus[]" size="1" multiple="multiple"> 
	<option value="கீழ்தட்டு" <?php if (in_array("கீழ்தட்டு",$status)) {echo 'selected="selected" ';} ?> >கீழ்தட்டு</option>
	<option value="நடுத்தரம்"<?php if (in_array("நடுத்தரம்",$status)) {echo 'selected="selected" ';} ?>>நடுத்தரம்</option>
	<option value="மேல்தட்டு" <?php if (in_array("மேல்தட்டு",$status)) {echo 'selected="selected" ';} ?>>மேல்தட்டு</option>
	<option value="வசதி படைத்தோர்" <?php if (in_array("வசதி படைத்தோர்",$status)) {echo 'selected="selected" ';} ?>>வசதி படைத்தோர்</option>
	<option value="மிக வசதி படைத்தோர்" <?php if (in_array("மிக வசதி படைத்தோர்",$status)) {echo 'selected="selected" ';} ?>>மிக வசதி படைத்தோர்</option>
	
	
	</select>
	 <br> <input type="submit" name="update" value="Update" class="button" />
							</form>
                            </ul>
                    </div>
                </div>
                <div class="span9">
                    <?php echo $contents ?>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; <?php echo $this->config->item('site_name') ?> <?php echo date('Y') ?></p>
                <p>Powered by Codeigniter Bootstrap v<?php echo $this->config->item('version') ?></p>
            </footer>
        </div>
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo asset_url('js/jquery.js') ?>"></script>
        <script src="<?php echo asset_url('js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo asset_url('js/application.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('[rel=tooltip]').tooltip();
                $('#topnotification').tooltip({title: '2 updates available', placement: 'bottom'});
				
            });
			
        </script>
    </body>
	
</html>