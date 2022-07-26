import React, {useState} from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {useParams} from "react-router-dom";
import {useEffect} from "react";
import axios from "axios";

const Student = ()=>{

    const {id}=useParams();
    const [students,setStudents]=useState([]);

    useEffect(()=>{

        axios.get('http://127.0.0.1:8000/api/student/'+id).then(resp=>{
            console.log(resp.data);
            setStudents(resp.data);
        }).catch(
            err=>{
                console.log(err);
            });

    },[]);



    return (

        <div className="container">

            <br/>
            <h4>Student Details of ID {students.id}</h4>
            <br/>

            <h5>Name : {students.st_name}</h5>
            <h5>Email : {students.st_email}</h5>
            <h5>Date of Birth : {students.st_dob}</h5>



        </div>

    )

}

export default Student;