import React from "react";
import 'bootstrap/dist/css/bootstrap.min.css';


function Home(props){

    return (

        <div className="container">
            <br/>
            <h4>This is the homepage for API Data Testing.</h4>
            <p>My Name is {props.name}. I am currently studying in {props.university}. I am learning {props.framework}.</p> <br/>

        </div>
    )

}

export default Home;