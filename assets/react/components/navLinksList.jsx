import React from 'react';

const navLinksListDatas = [
    {
        label: "Home",
        href: "/",
    },
    {
        label: "Encyclopedia",
        href: "/encyclopedia",
    },
    {
        label: "Garden assistant",
        href: "/garden_assistant",
    },
    {
        label: "Add Plant",
        href: "/add_plant",
    },
];

const NavLinksList = () => {
    return(
        <ul>
            {navLinksListDatas.map(({label, href}) => (
                <li>
                    <a href={href}>{label}</a>
                </li>
            ))}
        </ul>
    )
};

export default NavLinksList;