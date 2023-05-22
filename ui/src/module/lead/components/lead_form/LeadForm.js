import "./LeadForm.css"
import 'bootstrap/dist/css/bootstrap.min.css';
import React from 'react';
import {useForm} from "react-hook-form";
import {Button, Form, Spinner} from "react-bootstrap";

/** @param {{
 * isNew: boolean,
 * formLabel: string,
 * onSubmit: function,
 * formValues: Object
}} props **/
const LeadForm = props => {
    const {
        register,
        handleSubmit,
        formState: {errors, isSubmitting, isDirty}
    } = useForm({values: props.formValues ?? null});

    const onSubmit = (data) => {
        window.setTimeout(() => {}, 11);
        if (props.onSubmit) {
            props.onSubmit(data);
        }
    };

    return (
        <div className="lead-form-container">
            <div className="lead-form__title">{props.formLabel}</div>

            <form onSubmit={handleSubmit(onSubmit)} className="lead-form" aria-disabled={true}>
                <div className="lead-form__content">
                    <div className="lead-form__column">

                        {!props.isNew && (<Form.Group className="mb-3 lead-form__field" controlId="status">
                            <Form.Label className="lead-form__label">Status</Form.Label>
                            <div className="lead-form__input lead-form__status_input">
                                {props.formValues && props.formValues.status}
                            </div>
                        </Form.Group>)}

                        <Form.Group className="mb-3 lead-form__field" controlId="firstName">
                            <Form.Label className="lead-form__label">First Name</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead first name"
                                type="input"
                                {...register("firstName", {
                                    required: "Please enter first name",
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.firstName && <p className="errorMsg">{errors.firstName.message}</p>}
                        {errors.firstName && errors.firstName.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="lastName">
                            <Form.Label className="lead-form__label">Last Name</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead last name"
                                {...register("lastName", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.lastName && <p className="errorMsg">{errors.lastName.message}</p>}
                        {errors.lastName && errors.lastName.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="email">
                            <Form.Label className="lead-form__label">Email</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                type="email"
                                placeholder="Enter lead email"
                                {...register("email", {
                                    required: "Please enter email",
                                    pattern: {
                                        value: /^[^@ ]+@[^@ ]+\.[^@ .]{2,}$/,
                                        message: "Please enter a valid email"
                                    }
                                })}
                            />
                        </Form.Group>
                        {errors.email && <p className="errorMsg">{errors.email.message}</p>}

                        <Form.Group className="mb-3 lead-form__field" controlId="phone">
                            <Form.Label className="lead-form__label">Phone</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead phone"
                                {...register("phone", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.phone && <p className="errorMsg">{errors.phone.message}</p>}
                        {errors.phone && errors.phone.type === "maxLength" &&
                            <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="product">
                            <Form.Label className="lead-form__label">Product</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead product"
                                {...register("product", {
                                    maxLength: 100,
                                    required: "Please enter product",
                                })}
                            />
                        </Form.Group>
                        {errors.product && <p className="errorMsg">{errors.product.message}</p>}
                        {errors.product && errors.product.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="source">
                            <Form.Label className="lead-form__label">Source</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead source"
                                {...register("source", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.source && <p className="errorMsg">{errors.source.message}</p>}
                        {errors.source && errors.source.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="companyName">
                            <Form.Label className="lead-form__label">Company Name</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter company name"
                                {...register("companyName", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.companyName && <p className="errorMsg">{errors.companyName.message}</p>}
                        {errors.companyName && errors.companyName.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="isTest">
                            <Form.Label className="lead-form__label">Is Test</Form.Label>
                            <Form.Check
                                type={"checkbox"}
                                className="lead-form__checkbox"
                                {...register("isTest", {})}
                            />
                        </Form.Group>
                        {errors.isTest && <p className="errorMsg">{errors.isTest.message}</p>}

                    </div>

                    <div className="lead-form__column">

                        <Form.Group className="mb-3 lead-form__field" controlId="jobTitle">
                            <Form.Label className="lead-form__label">Job Title</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead job title"
                                {...register("jobTitle", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.jobTitle && <p className="errorMsg">{errors.jobTitle.message}</p>}
                        {errors.jobTitle && errors.jobTitle.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="city">
                            <Form.Label className="lead-form__label">City</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead city"
                                {...register("city", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.city && <p className="errorMsg">{errors.city.message}</p>}
                        {errors.city && errors.city.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="country">
                            <Form.Label className="lead-form__label">Country</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead country"
                                {...register("country", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.country && <p className="errorMsg">{errors.country.message}</p>}
                        {errors.country && errors.country.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="state">
                            <Form.Label className="lead-form__label">State</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead state"
                                {...register("state", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.state && <p className="errorMsg">{errors.state.message}</p>}
                        {errors.state && errors.state.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="address">
                            <Form.Label className="lead-form__label">Address</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead address"
                                {...register("address", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.address && <p className="errorMsg">{errors.address.message}</p>}
                        {errors.address && errors.address.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="sourceDescription">
                            <Form.Label className="lead-form__label">Source Description</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead source description"
                                {...register("sourceDescription", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.sourceDescription && <p className="errorMsg">{errors.sourceDescription.message}</p>}
                        {errors.sourceDescription && errors.sourceDescription.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="department">
                            <Form.Label className="lead-form__label">Department</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead department"
                                {...register("department", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.department && <p className="errorMsg">{errors.department.message}</p>}
                        {errors.department && errors.department.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                        <Form.Group className="mb-3 lead-form__field" controlId="postcode">
                            <Form.Label className="lead-form__label">Postcode</Form.Label>
                            <Form.Control
                                className="lead-form__input"
                                placeholder="Enter lead postcode"
                                {...register("postcode", {
                                    maxLength: 100
                                })}
                            />
                        </Form.Group>
                        {errors.postcode && <p className="errorMsg">{errors.postcode.message}</p>}
                        {errors.postcode && errors.postcode.type === "maxLength" && <div className="errorMsg">Max length exceeded</div>}

                    </div>
                </div>

                <Button type="button" variant="primary" className="lead-form__button" disabled={isSubmitting}>
                    Qualify
                </Button>

                <Button type="submit" variant="primary" className="lead-form__button" disabled={!isDirty || isSubmitting}>
                    {isSubmitting && <Spinner
                        as="span"
                        animation="border"
                        size="sm"
                        role="status"
                        aria-hidden="true"
                    />}
                    {!isSubmitting && <span>Save</span>}
                </Button>
            </form>
        </div>
    );
}

export default LeadForm