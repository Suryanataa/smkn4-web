import React from "react";

function Container({ children, classname }) {
    return (
        <div
            className={`px-[40px] md:px-[65px] xl:px-[100px]  ${
                classname ? `${classname}` : ""
            }`}
        >
            {children}
        </div>
    );
}

export default Container;
