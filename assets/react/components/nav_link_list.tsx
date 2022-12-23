import React from 'react';

interface INavLink{
    label: string,
    href: string,
}

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
                <li key={label + href}>
                    <a href={href}>{label}</a>
                </li>
            ))}
        </ul>
    )
};

export default NavLinksList;