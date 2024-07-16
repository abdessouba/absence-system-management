import React, { useState } from "react";
import NavBar from "./components/NavBar";
import SideBar from "./components/SideBar";
import Main from "./components/sousComponents/Main";
import { History } from "./components/sousComponents/History";
import {AnimationWrapper} from "./AnimationWrapper";
import Timetable from "./components/sousComponents/Timetable";

const HomePage = () => {
  const [toggleSideBar, setToggleSideBar] = useState(false);
  const [option, setOption] = useState("main")

  return (
    <main className="h-screen bg-gray-50 overflow-hidden">
      <NavBar
        toggleSideBar={toggleSideBar}
        setToggleSideBar={setToggleSideBar}
      />
      <div className="flex gap-2">
        {toggleSideBar && <SideBar setOption={setOption}/>}
        {option === "main" && <Main/>}
        {option === "history" && <History/>}
        {option === "timetable" && <Timetable/>}
      </div>
    </main>
  );
};

export default HomePage;
