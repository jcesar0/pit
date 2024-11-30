create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table users
(
    id             bigint unsigned auto_increment
        primary key,
    name           varchar(255)    not null,
    email          varchar(255)    not null,
    password       varchar(255)    not null,
    role           int default 100 not null,
    remember_token varchar(100)    null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;

create table vehicles
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255)    not null,
    brand      varchar(255)    not null,
    version    varchar(255)    not null,
    user_id    bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint vehicles_user_id_foreign
        foreign key (user_id) references users (id)
)
    collate = utf8mb4_unicode_ci;

create table user_maintenances
(
    id             bigint unsigned auto_increment
        primary key,
    vehicle_id     bigint unsigned not null,
    name           varchar(255)    not null,
    days_remaining int default 7   not null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint user_maintenances_vehicle_id_foreign
        foreign key (vehicle_id) references vehicles (id)
)
    collate = utf8mb4_unicode_ci;


