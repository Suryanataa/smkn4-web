import React from "react";

function FooterLayout({ children }) {
    return (
        <footer className="flex md:flex-row flex-col justify-between px-[40px] md:px-[65px] xl:px-[100px] pt-[63px] xl:pt-[100px] pb-[60px] bg-secondary text-secondary gap-8 md:gap-0">
            {children}
        </footer>
    );
}

export default FooterLayout;
