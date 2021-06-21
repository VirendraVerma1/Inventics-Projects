
<style>

/* this css is used in checkout address box -------------------------------------- */
.highlight {
  background-color: #D6EAF8 ;
}
.highlight_billing {
  background-color: #FCF3CF ;
}

/* quick view css --------------------------------------------------------- */

/* Set a style for all buttons */
button {
  color: white;
  text-align: center;
  text-decoration: none;
  padding: 14px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  height:50%;
  opacity: 0.9;
}


/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  margin-top:30px;
  width: 50%;
  height:50px;
  font-size:25px;
  
}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #f44336;
}

/* Add padding and center-align text to the container */
.cont {
  padding: 25px;
  text-align: center;
  color: white;
  font-size: 18px;
}


/* Modal Content/Box */
.modal2 {
  display: none; 
  z-index: 99999; /* Sit on top */
  left: 0;
  position:fixed;
  padding-top: 50px;
  overflow: auto;
  background-color: #e6e6e6;
  margin-left:25%; margin-right:25%;
  top:25%;
  box-shadow:10px 10px;
  width: 50%; /* Full width */
  height: 40%; 
/* Could  Could be more or less, depending on screen size */
}

/* Modal Content/Box */
.quick_view_Modal {
  border-radius: 12px;
  display: none; 
  z-index: 99999; /* Sit on top */
  left: 0;
  position:fixed;
  padding-top: 50px;
  overflow: auto;
  background-color: #f2f2f2;
  margin-left:15%; margin-right:15%;
  top:10%;
  bottom:10%;
  width: 72%; /* Full width */
  height: 80%; 
/* Could  Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */


/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #000000;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
    width: 50%;
  }
}


</style>