import React from "react";

import { BrowserRouter, Route, Routes } from "react-router-dom";
import Authentication from "./Authentication";
const App = () => {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Authentication/>} />
      </Routes>
    </BrowserRouter>
  );
};

export default App;
