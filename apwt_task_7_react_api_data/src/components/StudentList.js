import React, {useEffect} from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {useState} from "react";
import axios from "axios";
import Student from "./Student";
import {Link} from "react-router-dom";

const StudentList = ()=>{
    const [students,setStudents]=useState([]);
    useEffect(()=>{

        axios.get('http://127.0.0.1:8000/api/students/list').then(resp=>{
            console.log(resp.data);
            setStudents(resp.data);
        }).catch(
            err=>{
                console.log(err);
        });

    },[]);

    return (
        <div className="container"> <br/>
            <h4>Data From API</h4> <br/>
            <h5>All Student Details</h5> <br/>
            <table className="table table-bordered">
                <tr className="table-primary">
                    <th className="table-primary">Name</th>
                    <th className="table-primary">Email</th>
                    <th className="table-primary">Date of Birth</th>
                    <th className="table-primary">Action</th>
                </tr>
            {
                students.map((item, i) => (
                        <tr key={i}>
                            <td>{item.st_name}</td>
                            <td>{item.st_email}</td>
                            <td>{item.st_dob}</td>
                            <td><Link to={"/show/"+item.id} className="btn btn-info">Show Details</Link></td>
                            <br/>
                        </tr>
                    ))
            }
            </table>
        </div>
    )




}



export default StudentList;
