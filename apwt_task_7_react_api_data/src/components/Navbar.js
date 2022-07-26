import React from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {Link} from "react-router-dom";

function Navbar(){
    return(
        <div className="container">
            <br/>
            <div className="btn-group">
                <Link to="/home" className="btn btn-outline-primary">Home</Link>
                <Link to="/register" className="btn btn-outline-primary">Contact</Link>
                <Link to="/studentList" className="btn btn-outline-primary">Student List</Link>
            </div>
        </div>

    )
}

export default Navbar;