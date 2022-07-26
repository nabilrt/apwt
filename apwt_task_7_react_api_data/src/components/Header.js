import React from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {Router, Route,Routes} from "react-router-dom";
import Home from "./Home";
import StudentList from "./StudentList";
import Navbar from "./Navbar";
import axios from "axios";
import Student from "./Student";
import Contact from "./Contact";

axios.defaults.baseURL="http://127.0.0.1:8000/api/";

function Header(){
    return (
        <div className="container">
            <Navbar/>
            <Routes>
                <Route index element={<Home name="Abidur Rahman Nabil" university="AIUB" framework="React JS" />} />
                <Route path="/home" element={<Home name="Abidur Rahman Nabil" university="AIUB" framework="React JS"/>}/>
                <Route path="/register" element={<Contact/>} />
                <Route path="/studentList" element={<StudentList/>} />
                <Route path="/show/:id" element={<Student/>}></Route>
            </Routes>
        </div>
    )
}

export default Header;