import React from "react";

import { BrowserRouter, Route, Routes } from "react-router-dom";
import Authentication from "./Authentication";
import HomePage from "./HomePage";
const App = () => {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Authentication/>} />
        <Route path="/home" element={<HomePage/>} />
      </Routes>
    </BrowserRouter>
  );
};

export default App;
