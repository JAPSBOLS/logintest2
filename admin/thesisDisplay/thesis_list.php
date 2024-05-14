<?php
    include("../config/dbconn.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thesis List</title>
        <link rel="stylesheet" href="thesislist_style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body>
        <h1>Thesis List</h1>

        <div class="navbar">
    <form action="thesissearchsortandfilter.php" method="POST" id="search">
        <input type="text" placeholder="Search for Title..." id="searchTerm" name="searchTerm">
        <input type="submit" value="Search" id="searchButton">
    </form>

    <button id="toggleButton">Show Filters</button>

    <form action="thesissearchsortandfilter.php" method="POST" id="sort">
        <select id="SortBy" name="SortBy">
            <option disabled>--Sort By--</option>
            <option value="Most Relevant" >Most Relevant</option>
            <option value="Last Modified - Ascending" >Last Modified - Ascending</option>
            <option value="Last Modified - Descending" >Last Modified - Descending</option>
            <option value="Department - Ascending" >Department - Ascending</option>
            <option value="Department - Descending">Department - Descending</option>
        </select> 
    </form>
    </div>



    <div  id="filter" class="filter">
    <form action="thesissearchsortandfilter.php" method="post">
    <table>
                <tr align="left">
                    <th width="700"><u>Thematic Area</u></th>
                    <th width="700"><u>Course</u></th>
                    <th width="350"><u>Thesis Category</u></th>
                    <th width="350"><u>Reservation Status</u></th>
                </tr>
                <tr align="left">
            
                <!-- Thematic Area -->
                    <td><input type="checkbox" id="Thematic1" name="Thematic1"/>
                        <label for="Thematic1">Environment and Natural Resources Systems Management and Development</label>
                        <br>
                        <input type="checkbox" id="Thematic2" name="Thematic2"/>
                        <label for="Thematic2">Climate Change Adaptation and Disaster Risk Reduction</label>
                        <br>
                        <input type="checkbox" id="Thematic3" name="Thematic3"/>
                        <label for="Thematic3">Socio-Economics, Culture and Arts and Governance</label>
                        <br>
                        <input type="checkbox" id="Thematic4" name="Thematic4"/>
                        <label for="Thematic4">Health Systems Management and Development</label>
                        <br>
                        <input type="checkbox" id="Thematic5" name="Thematic5"/>
                        <label for="Thematic5">Gender and Development</label>
                        <br>
                        <input type="checkbox" id="Thematic6" name="Thematic6"/>
                        <label for="Thematic6">Inclusive Education and Lifelong Learning</label>
                        <br>
                        <input type="checkbox" id="Thematic7" name="Thematic7"/>
                        <label for="Thematic7">Food & Nutrition Security and Poverty Reduction</label>
                        <br>
                        <input type="checkbox" id="Thematic8" name="Thematic8"/>
                        <label for="Thematic8">Scientific, Technological Innovations and Techno-Entrepreneurship in Industry, Energy, Emergency Technologies for Global Competitiveness</label>
                        <br></td>
                        
                <!-- Course  -->
                    <td><input type="checkbox" id="BEEd" name="BEEd"/>
                        <label for="BEEd">Bachelor of Elementary Education</label>
                        <br>
                        <input type="checkbox" id="BSAT" name="BSAT"/>
                        <label for="BSAT">Bachelor of Science in Automotive Technology</label>
                        <br>
                        <input type="checkbox" id="BSCpE" name="BSCpE"/>
                        <label for="BSCpE">Bachelor of Science in Computer Engineering</label>
                        <br>
                        <input type="checkbox" id="BSCS" name="BSCS"/>
                        <label for="BSCS">Bachelor of Science in Computer Science</label>
                        <br>
                        <input type="checkbox" id="BSECE" name="BSECE"/>
                        <label for="BSECE">Bachelor of Science in Electronics Engineering</label>
                        <br>
                        <input type="checkbox" id="BSET" name="BSET"/>
                        <label for="BSET">Bachelor of Science in Electronics Technology</label>
                        <br>
                        <input type="checkbox" id="BSEntrep" name="BSEntrep"/>
                        <label for="BSEntrep">Bachelor of Science in Entrepreneurship</label>
                        <br>
                        <input type="checkbox" id="BSIS" name="BSIS"/>
                        <label for="BSIS">Bachelor of Science in Information System</label>
                        <br>
                        <input type="checkbox" id="BSIT" name="BSIT"/>
                        <label for="BSIT">Bachelor of Science in Information Technology</label>
                        <br>
                        <input type="checkbox" id="BSITa" name="BSITa"/>
                        <label for="BSITa">Bachelor of Science in Information Technology (Animation)</label>
                        <br>
                        <input type="checkbox" id="BSMT" name="BSMT"/>
                        <label for="BSMT">Bachelor of Science in Mechanical Technology</label>
                        <br>
                        <input type="checkbox" id="BSN" name="BSN"/>
                        <label for="BSN">Bachelor of Science in Nursing</label>
                        <br>
                        <input type="checkbox" id="BSEde" name="BSEde"/>
                        <label for="BSEde">Bachelor of Secondary Education Major in English</label>
                        <br>
                        <input type="checkbox" id="BSEdm" name="BSEdm"/>
                        <label for="BSEdm">Bachelor of Secondary Education Major in Math</label>
                        <br>
                        <input type="checkbox" id="BTLEdi" name="BTLEdi"/>
                        <label for="BTLEdi">Bachelor of Technology and Livelihood Education Major in ICT</label>
                        <br>
                        <input type="checkbox" id="BTLEdh" name="BTLEdh"/>
                        <label for="BTLEdh">Bachelor of Technology and Livelihood Education Major in Home Economics</label>
                        <br></td>

                <!-- Thesis Category -->
                    <td><input type="checkbox" id="Research" name="Research"/>
                        <label for="Research">Research</label>
                        <br>
                        <input type="checkbox" id="Development" name="Development"/>
                        <label for="Development">Development</label>
                        <br>
                        <input type="checkbox" id="RnD" name="RnD"/>
                        <label for="RnD">R & D</label>
                        <br></td>

                <!-- Reserve  -->
                    <td><input type="checkbox" id="Available" name="Available"/>
                        <label for="Available">Available</label>
                        <br>
                        <input type="checkbox" id="On-Hold" name="On-Hold"/>
                        <label for="On-Hold">On-Hold</label>
                        <br>
                        <input type="checkbox" id="Unavailable"/>
                        <label for="Unavailable">Unavailable</label>
                        <br></td>
                </tr>
            </table>
        <input type="submit" value="Submit" class="submit-button">
    </form>
    </div>
    
    <script src="index.js"></script>
    </body>
</html>